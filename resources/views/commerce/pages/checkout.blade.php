@extends('commerce.layout.app')

@section('content')
  @if(Cart::count() > 0)
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(/shop/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>
                        @if(session()->has('error_message'))
                            <div class="alert alert-success">
                                {{session()->get('error_message')}}
                            </div>
                        @endif
                            <form action="{{route('checkout.store')}}" id="payment-form" method="POST">
                                @csrf
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" name="first_name"
                                           class="form-control {{$errors->has('first_name') ? 'is-invalid':''}}"
                                           value="{{old('first_name')}}">
                                    @if($errors->has('first_name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('first_name')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" name="last_name" class="form-control {{$errors->has('last_name') ? 'is-invalid' : ''}}"
                                           id="last_name" value="{{old('last_name')}}" >
                                    @if($errors->has('last_name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('last_name')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" name="country" id="country">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" name="address" class="form-control mb-3 {{$errors->has('address') ? 'is-invalid' : ''}}"
                                           id="address" value="{{old('address')}}">
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('address')}}
                                        </div>
                                    @endif
{{--                                    <input type="text" class="form-control" id="street_address2" value="">--}}
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" name="postalcode" class="form-control {{$errors->has('postalcode') ? 'is-invalid' : ''}}"
                                           id="postalcode" value="">
                                    @if($errors->has('postalcode'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('postalcode')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" name="city" class="form-control {{$errors->has('city') ? 'is-invalid' : ''}}"
                                           id="city" value="{{old('city')}}">
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('city')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="state">Province <span>*</span></label>
                                    <input type="text" name="province" class="form-control" id="province" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="text" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}"
                                           id="phone_number" min="0" value="{{old('phone')}}">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                           id="email_address" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">

                            <li><span>Product</span> <span>Total</span></li>
                            @foreach(Cart::content() as $product)
                                <li><span><a href="{{route('show.product', $product->model->slug)}}"> {{$product->name}}</a></span> <span>{{presentPrice($product->price)}}</span>
                            @endforeach
{{--                            <li><span>Subtotal</span> <span>$59.90</span></li>--}}
{{--                            <li><span>Shipping</span> <span>Free</span></li>--}}
                            <li><span>Total</span> <span>{{presentPrice(Cart::subtotal())}}</span></li>

                        </ul>

                            <div id="accordion" role="tablist" class="mb-4">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>credit card</a>
                                        </h6>
                                    </div>

                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="card-element">
                                                Credit or debit card
                                            </label>

                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>

                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>

                                        </div>
                                          <button type="submit"id="complete-order" class="btn essence-btn">Place Order</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                        </h6>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@else
      <br>
      <br>
      <br>
      <div class="text-center">
             <h1>
                 <p>You have not added this product to the cart</p>
             </h1>
      </div>


@endif
@endsection

@section('js')
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_RD9urdtnGAZksNuNVZko1eLh00K1cAbYdd');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

        document.getElementById('complete-order').disabled = true;

            var options = {
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
            }

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;


                    document.getElementById('complete-order').disabled = false;

                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

    </script>
@endsection

