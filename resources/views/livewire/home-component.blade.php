<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                @foreach($sliders as $slide)
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/sliders') }}/{{ $slide->image }}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title"><b>{{ $slide->title }}</b></h2>
                            <span class="subtitle">{{ $slide->subtitle }}</span>
                            <p class="sale-info">Only price: <span class="price">${{ $slide->price }}</span></p>
                            <a href="{{$slide->link}}" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--On Sale-->
        @if($pOnSales->count() > 0 && $saleDate->status == 1 && $saleDate->sale_date > Carbon\Carbon::now())
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">On Sale</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($saleDate->sale_date)->format('Y/m/d h:m:s') }}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach($pOnSales as $p)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details', ['slug' => $p->slug]) }}" title="{{ $p->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $p->image }}" width="800" height="800" alt="{{ $p->name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details', ['slug' => $p->slug]) }}" class="product-name"><span>{{ $p->name }}</span></a>
                                <div class="wrap-price"><ins><p class="product-price">${{ $p->sale_price }}</p></ins> <del><p class="product-price">${{ $p->regular_price }}</p></del></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach($latestProducts as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}" title="{{ $product->name }}">
                                                <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="800" height="800" alt="{{ $product->name }}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach($categories as $key => $cat)
                            <a href="#category_{{ $cat->id }}" class="tab-control-item {{$key==0 ? 'active':''}}">{{ $cat->name }}</a>
                        @endforeach

                    </div>
                    <div class="tab-contents">
                        @foreach($categories as $key => $category)
                            <div class="tab-content-item {{$key==0 ? 'active':''}}" id="category_{{ $category->id }}">
                                @php
                                    $c_products = DB::table('products')->where('category_id', $category->id)->get()->take($nOfProducts);
                                @endphp
                                @if($c_products->count()<=0)

                                @else
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                        @foreach($c_products as $c_product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{ route('product.details', ['slug' => $c_product->slug]) }}" title="{{ $c_product->name }}">
                                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $c_product->image }}" width="800" height="800" alt="{{ $c_product->name }}"></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{ route('product.details', ['slug' => $c_product->slug]) }}" class="product-name"><span>{{ $c_product->name }}</span></a>
                                                    <div class="wrap-price"><span class="product-price">${{ $c_product->regular_price }}</span></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
