<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if(Cart::getContent()->count() > 0)
            <div class="wrap-iten-in-cart">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ Session::get('message') }}</strong>
                    </div>
                @endif

                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">

                        @foreach(Cart::getContent() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                </div>
                                <div class="price-field produtc-price">
                                    @if($item->model->sale_price)
                                        <p class="price">${{$item->model->sale_price}} <small><del>${{ $item->model->regular_price }}</del></small></p>
                                    @else
                                        <p class="price">${{ $item->model->regular_price }}</p>
                                    @endif
                                </div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity-{{$item->id}}" value="{{ $item->quantity }}" data-max="120" pattern="[0-9]*" >
                                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{ $item->id }}')")></a>
                                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{ $item->id }}')"></a>
                                    </div>
                                </div>
                                <div class="price-field sub-total"><p class="price">${{ $item->model->subtotal }}</p></div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title="" wire:click.prevent="destory('{{ $item->id }}')">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
            </div>
                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ Cart::getSubTotal() }}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{ Cart::getTotal() }}</b></p>
                    </div>
                    <div class="checkout-info">
                        <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                        <a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll">Clear Shopping Cart</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding: 30px 0;">
                    <h1> You don't have any items in cart!</h1>
                    <p>add some product first</p>
                    <a href="/shop" class="btn btn-success">Shop Here</a>
                </div>
            @endif



            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Other Products That You May like</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                        @foreach($otherProducts as $item)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details', ['slug' => $item->slug]) }}" title="{{ $item->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->image }}" width="214" height="214" alt="{{ $item->name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    @if($item->sale_price)
                                        <span class="flash-item sale-label">sale</span>
                                    @endif
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>

                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details', ['slug' => $item->slug]) }}" class="product-name"><span>{{ $item->name }}</span></a>
                                @if($item->sale_price)
                                    <div class="wrap-price"><ins><p class="product-price">${{ $item->sale_price }}</p></ins> <del><p class="product-price">${{ $item->regular_price }}</p></del></div>
                                @else
                                    <div class="wrap-price"><ins><p class="product-price">${{ $item->regular_price }}</p></ins> </div>
                                    @endif
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
