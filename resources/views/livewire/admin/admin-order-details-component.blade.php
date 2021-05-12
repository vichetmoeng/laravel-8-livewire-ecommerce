
<div class="container mt-6" id="dashboard-user-main" style="margin-top: 30px;">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav flex-column pl-1">
                <li class="menu-item" >
                    <a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="menu-item">
                    <a title="Category" href="{{ route('admin.categories') }}">Categories</a>
                </li>
                <li class="menu-item">
                    <a title="Products" href="{{ route('admin.products') }}">Products</a>
                </li>
                <li class="menu-item">
                    <a title="Home Slider" href="{{ route('admin.homeslider') }}">Manage Home Slider</a>
                </li>
                <li class="menu-item">
                    <a title="Manage Home Categories" href="{{ route('admin.homecategories') }}">Manage Home Categories</a>
                </li>
                <li class="menu-item">
                    <a title="Manage Sale Date" href="{{ route('admin.sale') }}">Manage Sale Date</a>
                </li>

                <li class="menu-item">
                    <a title="Manage Orders" href="{{ route('admin.orders') }}">Orders</a>
                </li>
                <li class="menu-item">
                    <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">Logout</a>
                </li>
                <form id="admin-logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
        <!--/col-->
        <div class="col-md-9 col-lg-10 main">

            <div class="row mb-3">
                <div class="col-12 col-xl-12 col-lg-12">

                    <div class="container" style="padding: 30px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Ordered Item
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('admin.orders') }}" class="btn btn-success pull-right">All Orders</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>Order Id</th>
                                                <td>{{ $order->id }}</td>
                                                <th>Order Date</th>
                                                <td>{{ $order->created_at }}</td>
                                                <th>Status</th>
                                                <td>{{ $order->status }}</td>
                                                @if($order->status == 'delivered')
                                                    <th>Delivery Date</th>
                                                    <td>{{ $order->delivered_date }}</td>
                                                @elseif($order->status == 'canceled')
                                                    <th>Canceled Date</th>
                                                    <td>{{ $order->canceled_date }}</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div class="wrap-iten-in-cart">
                                            <h3 class="box-title">Products Name</h3>
                                            <ul class="products-cart">

                                                @foreach($order->orderItems as $item)
                                                    <li class="pr-cart-item">
                                                        <div class="product-image">
                                                            <figure><img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}"></figure>
                                                        </div>
                                                        <div class="product-name">
                                                            <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                                        </div>
                                                        <div class="price-field produtc-price">
                                                            <p class="price">${{ $item->price }}</p>
                                                        </div>
                                                        <div class="quantity">
                                                            <h5>{{ $item->quantity }}</h5>
                                                        </div>
                                                        <div class="price-field sub-total"><p class="price">${{ $item->price * $item->quantity }}</p></div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="summary">
                                            <div class="order-summary">
                                                <h4 class="title-box">Order Summary</h4>
                                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ $order->subtotal }}</b></p>
                                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                                <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{ $order->total }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Billing Details
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>First Name</th>
                                                <td>{{ $order->firstname }}</td>
                                                <th>Last Name</th>
                                                <td>{{ $order->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $order->mobile }}</td>
                                                <th>Email</th>
                                                <td>{{ $order->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $order->line }}</td>
                                                <th>City</th>
                                                <td>{{ $order->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td>{{ $order->country }}</td>
                                                <th>Zipcode</th>
                                                <td>{{ $order->zipcode }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($order->is_shipping_different)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Shipping Address
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <th>First Name</th>
                                                    <td>{{ $order->shipping->firstname }}</td>
                                                    <th>Last Name</th>
                                                    <td>{{ $order->shipping->lastname }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td>{{ $order->shipping->mobile }}</td>
                                                    <th>Email</th>
                                                    <td>{{ $order->shipping->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $order->shipping->line }}</td>
                                                    <th>City</th>
                                                    <td>{{ $order->shipping->city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td>{{ $order->shipping->country }}</td>
                                                    <th>Zipcode</th>
                                                    <td>{{ $order->shipping->zipcode }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Transaction
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>Transaction Mode</th>
                                                <td>{{ $order->transaction->mode == 'cod' ? 'Cash On Delivery':'Credit Card' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{{ $order->transaction->status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Transaction Date</th>
                                                <td>{{ $order->transaction->created_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/main col-->
    </div>

</div>


