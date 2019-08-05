@extends('commerce.layout.app')

@section('content')
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class=" ">
                <img src="{{$product->getImage($product->id)}}" alt="">
            </div>
        </div>
        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <a>
                <h2>{{$product->name}}</h2>
            </a>
            <i>{{$product->stock()}}</i>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
            <p class="product-price">
                @if($product->discount_price)
                    <span class="old-price">
                      {{presentPrice($product->original_price)}}
                    </span>
                    {{presentPrice($product->getDiscountPrice(
                      $product->discount_price,
                      $product->original_price))
                      }}
                @else
                    {{presentPrice($product->original_price)}}
                @endif
            </p>
            <p class="product-desc">{{$product->description}}</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post" action="{{route('cart.store')}}">
                @csrf
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select  id="productSize" class="mr-5">
                        <option value="value">Size: XL</option>
                        <option value="value">Size: X</option>
                        <option value="value">Size: M</option>
                        <option value="value">Size: S</option>
                    </select>
                    <select  id="productColor">
                        <option value="value">Color: Black</option>
                        <option value="value">Color: White</option>
                        <option value="value">Color: Red</option>
                        <option value="value">Color: Purple</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">

                    @if($product->discount_price)
                        <input type="hidden" name="price" value="{{$product->getDiscountPrice(
                          $product->discount_price,
                          $product->original_price)}}">
                    @else
                       <input type="hidden" name="price" value="{{$product->original_price}}">
                    @endif
                    <!-- Cart -->
                    @if($product->quantity > 0)
                    <button type="submit"  class="btn essence-btn">Add to cart</button>
                    @endif
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

@endsection

