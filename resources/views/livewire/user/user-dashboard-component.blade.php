
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
                Dashboard
            </h1>
            <div class="row mb-3">
                <div class="col-12 col-xl-12 col-lg-12">
                   // dashboard contain
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/main col-->
    </div>

</div>
