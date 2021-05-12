<div class="wrap-icon-section minicart pull-right">
    <a href="/cart" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::getContent()->count() > 0)
                <span class="index">{{ Cart::getContent()->count() }} items</span>
                <span class="title">CART</span>
            @else
                <span class="index">0 items</span>
                <span class="title">CART</span>
            @endif
        </div>
    </a>
</div>
