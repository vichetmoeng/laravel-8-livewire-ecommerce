
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
                    <a title="Manage Users" href="{{ route('admin.users') }}">Users</a>
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
                    <div>
                        <style>
                            nav svg{
                                height: 20px;
                            }
                            nav .hidden{
                                display: block !important;
                            }
                        </style>
                        <div class="container" style="padding: 30px 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            All Orders
                                        </div>
                                        <div class="panel-body">

                                            @if(Session::has('delivered'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('delivered') }}</div>
                                            @endif
                                            @if(Session::has('canceled'))
                                                <div class="alert alert-danger" role="alert">{{ Session::get('canceled') }}</div>
                                            @endif
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subtotal</th>
                                                    <th>Total</th>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Order Date</th>
                                                    <th colspan="2" class="text-center">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        <td>${{ $order->subtotal }}</td>
                                                        <td>${{ $order->total }}</td>
                                                        <td>{{ $order->lastname }} {{ $order->firstname }}</td>
                                                        <td>{{ $order->mobile }}</td>
                                                        <td>{{ $order->email }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm">View</a>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')">Delivered</a> </li>
                                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'canceled')">Canceled</a> </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $orders->links() }}
                                        </div>
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


