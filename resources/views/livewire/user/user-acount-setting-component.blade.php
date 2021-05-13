
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
                Account Setting
            </h1>
            <div class="row mb-3">
                <div class="col-12 col-xl-12 col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col">
                                    Your information
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
            <!--/row-->
        </div>
        <!--/main col-->
    </div>

</div>
