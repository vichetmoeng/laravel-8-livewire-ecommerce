
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
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col">
                                                    Admin information
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            Basic information
                                                        </div>
                                                        <div class="panel-body container-fluid">
                                                            <p><strong>Name: </strong>{{ $name }}</p>
                                                            <p><strong>Email: </strong>{{ $email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            Update info
                                                        </div>
                                                        <div class="panel-body container-fluid">
                                                            @if(Session::has('updateinfo'))
                                                                <div class="alert alert-success" role="alert">{{ Session::get('updateinfo') }}</div>
                                                            @endif
                                                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateInfo">
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
                                                                    <label class="col-md-4 control-label"></label>
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            Change Password
                                                        </div>
                                                        <div class="panel-body">
                                                            @if(Session::has('passwordchanged'))
                                                                <div class="alert alert-success" role="alert">{{ Session::get('passwordchanged') }}</div>
                                                            @endif
                                                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="changePassword">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">New Password</label>
                                                                    <div class="col-md-4">
                                                                        <input type="password" placeholder="New Password" class="form-control input-md" wire:model="password" />
                                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Confirm Password</label>
                                                                    <div class="col-md-4">
                                                                        <input type="password" placeholder="Confirm Password" class="form-control input-md" wire:model="confirmpassword" />
                                                                        @error('confirmpassword') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label"></label>
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary">Change Password</button>
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
                        </div>
                    </div>

                </div>
            </div>
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
                                                    All Customers
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.adduser') }}" class="btn btn-success pull-right">Add New</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <table id="datatable" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.edituser', ['user_id' => $user->id]) }}"><i class="fa fa-edit fa-2x text-info"></i> </a>
                                                                <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{ $user->id }})"><i class="fa fa-times fa-2x text-danger" style="margin-left: 10px;"></i> </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

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
