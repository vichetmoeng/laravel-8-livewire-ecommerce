<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
                <li class="item-link"><span>{{ $product->name }}</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-11 col-sm-11 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                    @if($product->image)
                                        <li data-thumb="{{ asset('assets/images/products') }}/{{ $product->image }}">
                                        <img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}" />
                                    @else
                                        <li data-thumb="{{ asset('assets/images/products/noimage.png') }}">
                                        <img src="{{ asset('assets/images/products/noimage.png') }}" alt="{{ $product->name }}" />
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            {{ $product->short_description }}
                        </div>
                        <div class="wrap-price">
                            @if($product->sale_price > 0 && $saleDate->status == 1 && $saleDate->sale_date > Carbon\Carbon::now())
                                <span class="product-price" style="color: red">${{ $product->sale_price }}</span>
                                <small><del>${{ $product->regular_price }}</del></small>
                            @else
                                <span class="product-price">${{ $product->regular_price }}</span>
                            @endif
                        </div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: @if($product->stock_status === 'instock')<b>In Stock</b>@else<b>Out Stock</b>@endif</p>
                        </div>
                        @if($product->stock_status === 'instock')
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty" >
                                    <a class="btn btn-reduce" wire:click.prevent="decreaseQuantity" href="#"></a>
                                    <a class="btn btn-increase" wire:click.prevent="increaseQuantity" href="#"></a>
                                </div>
                            </div>
                        @endif
                        <div class="wrap-butons">
                            @if($product->sale_price)
                                <a href="#" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})" class="btn add-to-cart @if($product->stock_status === 'outofstock') hidden @endif" >Add to Cart</a>
                            @else
                                <a href="#" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="btn add-to-cart @if($product->stock_status === 'outofstock') hidden @endif " >Add to Cart</a>
                            @endif
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-loop="false" data-nav="true" data-dots="false"
                             data-items="5"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            @foreach($relatedProducts as $productRe)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $productRe->slug]) }}" title="{{ $productRe->name }}">
                                            @if($productRe->image)
                                                <figure><img src="{{ asset('assets/images/products') }}/{{ $productRe->image }}" width="214" height="214" alt="{{ $productRe->name }}"></figure>
                                            @else
                                                <figure><img src="{{ asset('assets/images/products/noimage.png') }}" width="214" height="214" alt="{{ $productRe->name }}"></figure>
                                            @endif
                                        </a>
                                        <div class="group-flash">
                                            @if($productRe->created_at > now()->subWeek())
                                                <span class="flash-item new-label">new</span>
                                            @endif
                                            @if($productRe->sale_price)
                                                <span class="flash-item sale-label">sale</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $productRe->slug]) }}" class="product-name"><span>{{ $productRe->name }}</span></a>
                                        @if($productRe->sale_price)
                                            <div class="wrap-price"><ins><p class="product-price">${{ $productRe->sale_price }}</p></ins> <del><p class="product-price">${{ $productRe->regular_price }}</p></del></div>
                                        @else
                                            <div class="wrap-price"><span class="product-price">${{ $productRe->regular_price }}</span></div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->
    <script>
        $(document).getElementById('')
    </script>
</main>
