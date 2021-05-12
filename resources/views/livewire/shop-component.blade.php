<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>All Book</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-11 col-sm-11 col-xs-12 main-content-area">

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}" title="{{ $product->name }}">
                                            @if($product->image)
                                                <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}"></figure>
                                            @else
                                                <figure><img src="{{ asset('assets/images/products/noimage.png') }}" alt="{{ $product->name }}"></figure>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price">
                                            <span class="product-price">
                                                @if($product->sale_price)
                                                    <span style="color: red">${{ $product->sale_price }}</span> <small><del>${{ $product->regular_price }}</del></small>
                                                @else
                                                    ${{ $product->regular_price }}
                                                @endif
                                            </span>
                                        </div>
                                        @if($product->sale_price)
                                            <a href="#" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})" class="btn add-to-cart @if($product->stock_status == 'outofstock') hidden @endif"  >Add To Cart</a>
                                        @else
                                            <a href="#" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})" class="btn add-to-cart @if($product->stock_status == 'outofstock') hidden @endif">Add To Cart</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div><!--end main products area-->
        </div><!--end row-->

    </div><!--end container-->

</main>
