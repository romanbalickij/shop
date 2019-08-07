<div class="col-12 col-md-4 col-lg-3">
    <div class="shop_sidebar_area">

        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Catagories</h6>

            <!--  Catagories  -->
            <div class="catagories-menu">
                <ul id="menu-content2" class="menu-content collapse show">
                    <!-- Single Item -->
                    @foreach($categories as $category )
                      <li data-toggle="collapse" data-target="#clothing">
                        <a href="#">{{$category->name}}</a>
                        <ul class="sub-menu collapse show" id="clothing">
                    @foreach($category->children as $children)
                        <li><a href={{route('shop.category', $children->slug)}}>{{$children->name}}</a></li>
                    @endforeach
                        </ul>
                      </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <form action="{{route('shop.sort')}}" method="POST">
            @csrf
        <!-- ##### Single Widget ##### -->
        <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Filter by</h6>
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Price</p>

            <div id="slider-range"></div>
            <div class="price--output">
                <span>Min $<input type="text" name="min"  min=0 id="min_price"  value="{{old('min')}}" ></span>
                <span>Max $<input type="text" name="max"  min=0 id="max_price"  value="{{old('max')}}" ></span>
                <br>
                <br>
            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget brands mb-50">
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Brands</p>
            <div class="widget-desc">
                @foreach($brands as $brand)
                    <ul>
                        <li><p><input type="checkbox" name="brands[]" value="{{$brand->id}}" ><span><b>{{$brand->name}}</b></span></p></li>
                    </ul>
                @endforeach
            </div>
        </div>
{{--        <div class="widget color mb-50">--}}
{{--            <!-- Widget Title 2 -->--}}
{{--            <p class="widget-title2 mb-30">Color</p>--}}
{{--            <div class="widget-desc">--}}
{{--                <ul class="d-flex">--}}
{{--                    <li><a href="#" class="color1"></a></li>--}}
{{--                    <li><a href="#" class="color2"></a></li>--}}
{{--                    <li><a href="#" class="color3"></a></li>--}}
{{--                    <li><a href="#" class="color4"></a></li>--}}
{{--                    <li><a href="#" class="color5"></a></li>--}}
{{--                    <li><a href="#" class="color6"></a></li>--}}
{{--                    <li><a href="#" class="color7"></a></li>--}}
{{--                    <li><a href="#" class="color8"></a></li>--}}
{{--                    <li><a href="#" class="color9"></a></li>--}}
{{--                    <li><a href="#" class="color10"></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- ##### Single Widget ##### -->
{{--        <div class="widget brands mb-50">--}}
{{--            <!-- Widget Title 2 -->--}}
{{--            <p class="widget-title2 mb-30">Brands</p>--}}
{{--            <div class="widget-desc">--}}
{{--                @foreach($brands as $brand)--}}
{{--                <ul>--}}
{{--                    <li><a href="{{route('shop.brand', $brand->slug)}}">{{$brand->name}}</a></li>--}}
{{--                </ul>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--        </div>--}}

    </div>
    <button type="submit" class="btn btn-light">Sort </button>
    </form>
</div>


