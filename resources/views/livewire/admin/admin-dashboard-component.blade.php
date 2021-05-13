
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
            <h1 class="display-2 hidden-xs-down">
                Dashboard
            </h1>
            <div class="row" style="margin-top: 1rem !important;">
                <div class="col col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success text-center" style="padding: 1rem !important;">
                            <h6 class="text-uppercase">All Orders</h6>
                            <h1 class="display-1">{{ $allOrders }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success text-center" style="padding: 1rem !important;">
                            <h6 class="text-uppercase">All Products</h6>
                            <h1 class="display-1">{{ $allProduct }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"  style="margin-top: 1rem !important;">
                <div class="col col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success text-center" style="padding: 1rem !important;">
                            <h6 class="text-uppercase">All Categories</h6>
                            <h1 class="display-1">{{ $allCat }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success text-center" style="padding: 1rem !important;">
                            <h6 class="text-uppercase">All Users</h6>
                            <h1 class="display-1">{{ $allUsers }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/main col-->
    </div>

</div>
