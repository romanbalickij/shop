@extends('commerce.layout.app')

@section('content')

        <!-- ##### Right Side Cart Area ##### -->
        <div class="cart-bg-overlay"></div>

{{--        <div class="right-side-cart-area">--}}
{{--            <!-- Cart Button -->--}}
{{--            <div class="cart-button">--}}
{{--                <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>--}}
{{--            </div>--}}
{{--            <div class="cart-content d-flex">--}}

{{--                <!-- Cart List Area -->--}}
{{--                <div class="cart-list">--}}
{{--                    <!-- Single Cart Item -->--}}
{{--                    <div class="single-cart-item">--}}
{{--                        <a href="#" class="product-image">--}}
{{--                            <img src="/shop/img/product-img/product-1.jpg" class="cart-thumb" alt="">--}}
{{--                            <!-- Cart Item Desc -->--}}
{{--                            <div class="cart-item-desc">--}}
{{--                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>--}}
{{--                                <span class="badge">Mango</span>--}}
{{--                                <h6>Button Through Strap Mini Dress</h6>--}}
{{--                                <p class="size">Size: S</p>--}}
{{--                                <p class="color">Color: Red</p>--}}
{{--                                <p class="price">$45.00</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <!-- Single Cart Item -->--}}
{{--                    <div class="single-cart-item">--}}
{{--                        <a href="#" class="product-image">--}}
{{--                            <img src="/shop/img/product-img/product-2.jpg" class="cart-thumb" alt="">--}}
{{--                            <!-- Cart Item Desc -->--}}
{{--                            <div class="cart-item-desc">--}}
{{--                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>--}}
{{--                                <span class="badge">Mango</span>--}}
{{--                                <h6>Button Through Strap Mini Dress</h6>--}}
{{--                                <p class="size">Size: S</p>--}}
{{--                                <p class="color">Color: Red</p>--}}
{{--                                <p class="price">$45.00</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <!-- Single Cart Item -->--}}
{{--                    <div class="single-cart-item">--}}
{{--                        <a href="#" class="product-image">--}}
{{--                            <img src="/shop/img/product-img/product-3.jpg" class="cart-thumb" alt="">--}}
{{--                            <!-- Cart Item Desc -->--}}
{{--                            <div class="cart-item-desc">--}}
{{--                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>--}}
{{--                                <span class="badge">Mango</span>--}}
{{--                                <h6>Button Through Strap Mini Dress</h6>--}}
{{--                                <p class="size">Size: S</p>--}}
{{--                                <p class="color">Color: Red</p>--}}
{{--                                <p class="price">$45.00</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Cart Summary -->--}}
{{--                <div class="cart-amount-summary">--}}

{{--                    <h2>Summary</h2>--}}
{{--                    <ul class="summary-table">--}}
{{--                        <li><span>subtotal:</span> <span>$274.00</span></li>--}}
{{--                        <li><span>delivery:</span> <span>Free</span></li>--}}
{{--                        <li><span>discount:</span> <span>-15%</span></li>--}}
{{--                        <li><span>total:</span> <span>$232.00</span></li>--}}
{{--                    </ul>--}}
{{--                    <div class="checkout-btn mt-100">--}}
{{--                        <a href="checkout.html" class="btn essence-btn">check out</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ##### Right Side Cart End ##### -->

        <!-- ##### Breadcumb Area Start ##### -->
        <div class="breadcumb_area bg-img" style="background-image: url(/shop/img/bg-img/breadcumb.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>dresses</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcumb Area End ##### -->

        <!-- ##### Shop Grid Area Start ##### -->
        <section class="shop_grid_area section-padding-80">
            <div class="container">
                <div class="row">
                 @include('commerce.partial.sidebar')

                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop_grid_product_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-topbar d-flex align-items-center justify-content-between">
                                        <!-- Total Products -->
                                        <div class="total-products">
                                            <p><span> {{$products->total()}} </span> products found</p>
                                        </div>
                                        <!-- Sorting -->
                                        <div class="product-sorting d-flex">
                                            <p>Sort by:</p>
                                            <form action="#" method="get">
                                                <select name="select" id="sortByselect">
                                                    <option value="value">Highest Rated</option>
                                                    <option value="value">Newest</option>
                                                    <option value="value">Price: $$ - $</option>
                                                    <option value="value">Price: $ - $$</option>
                                                </select>
                                                <input type="submit" class="d-none" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                             @foreach($products as $product)
                                <!-- Single Product -->
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">

                                            <img src="{{$product->getImage()}}" alt="">                                        <!-- Hover Thumb -->
                                            <!-- Product Badge -->
                                            @if($product->discount_price)
                                                <div class="product-badge offer-badge">
                                                    <span>-{{$product->discount_price}}%</span>
                                                </div>
                                            @endif
                                            <!-- Favourite -->
                                            <div class="product-favourite">
                                                <a href="#" class="favme fa fa-heart"></a>
                                            </div>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span>topshop</span>
                                            <a href="#">
                                                <h6>{{$product->name}}</h6>
                                            </a>
                                            <p class="product-price">
                                                @if($product->discount_price)
                                                    <span class="old-price">
                                                        {{presentPrice($product->getDiscountPrice())}}
                                                    </span>
                                                @endif
                                                        {{ presentPrice($product->original_price)}}</p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                            </div>
                        </div>
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination mt-50 mb-70">
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Shop Grid Area End ##### -->

    @endsection
