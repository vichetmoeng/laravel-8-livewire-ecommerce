


<div class="container mt-6" id="dashboard-user-main" style="margin-top: 30px;">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav flex-column pl-1">
                <li class="menu-item" >
                    <a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="menu-item" >
                    <a title="My Orders" href="{{ route('user.orders') }}">My Orders</a>
                </li>
                <li class="menu-item" >
                    <a title="Account Setting" href="{{ route('user.setting') }}">Account Setting</a>
                </li>
                <li class="menu-item">
                    <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">Logout</a>
                </li>
                <form id="user-logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
        <!--/col-->
        <div class="col-md-9 col-lg-10 main">
            <h1 class="display-2 hidden-xs-down">
                All Orders
            </h1>
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
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($orders->count() > 0)
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
                                                                <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm">View</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9" class="text-center">No order record.</td>
                                                    </tr>
                                                @endif

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

