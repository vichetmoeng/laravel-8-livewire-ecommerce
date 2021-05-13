
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    Edit customer account
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.users') }}" class="btn btn-success pull-right">All Customer</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateUser">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Name</label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" />
                                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-4">
                                                        <input type="email" placeholder="Email" class="form-control input-md" wire:model="email" />
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Role</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control"  wire:model="role">
                                                            <option value="">Select Role</option>
                                                            <option value="ADM">Admin</option>
                                                            <option value="USR">Customer</option>
                                                        </select>
                                                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"></label>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>


                                            </form>

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
