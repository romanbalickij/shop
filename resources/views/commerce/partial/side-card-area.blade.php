<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="/shop/img/core-img/bag.svg" alt=""> <span></span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <div class="single-cart-item">

               @foreach(Cart::content() as $product)

                <a href="{{route('show.product', $product->model->slug)}}" class="product-image">
                    <img src="{{$product->model->getImage($product->id, 'thumbnail')}}" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <form action="{{route('cart.delete', $product->rowId)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <span class="product-remove"> <button type="submit"  class="btn btn-dark">X</button></span>
                        </form>
                        <br>
                        <h6>{{$product->name}}</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">
                            {{presentPrice($product->price)}}
                        </p>
                    </div>
                </a>
               @endforeach
            </div>
        </div>

        <!-- Cart Summary -->
          <div class="cart-amount-summary">
              @if(Cart::count() > 0)

            <h2>Summary</h2>
            <ul class="summary-table">
{{--                <li><span>subtotal:</span> <span>$274.00</span></li>--}}
{{--                <li><span>delivery:</span> <span>Free</span></li>--}}
{{--                <li><span>discount:</span> <span>-15%</span></li>--}}
                <li><span>total:</span> <span>{{presentPrice(Cart::subtotal())}}</span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="{{route('checkout.index')}}" class="btn essence-btn">check out</a>
            </div>
              @else
                  <h1>Your cart is empty</h1>
              @endif
        </div>

    </div>
</div>
