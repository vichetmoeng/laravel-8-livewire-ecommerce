
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

                    <div>
                        <div class="container" style="padding: 30px 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    Add New Product
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Product Name</label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" placeholder="Short Description" wire:model="shortDescription"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Description</label>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Regular Price</label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regularPrice" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Sale Price</label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="salePrice" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Stock</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" wire:model="stockStatus">
                                                            <option value="instock">In Stock</option>
                                                            <option value="outofstock">Out Stock</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Featured</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control"  wire:model="featured">
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Quantity</label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Product Image</label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="input-file" wire:model="image" />
                                                        @if($image)
                                                            <img src="{{ $image->temporaryUrl() }}" width="120" alt="">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Category</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" wire:model="categoryId">
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"></label>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-primary">Add</button>
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
