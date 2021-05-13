
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
                                                    All Products
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                            @endif
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Stock</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Discounted</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>
                                                            @if($product->image)
                                                                <img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60"  alt=""/>
                                                            @else
                                                                <img src="{{ asset('assets/images/products/noimage.png') }}" width="60"  alt=""/>
                                                            @endif
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->stock_status }}</td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->regular_price }}</td>
                                                        <td>@if($product->sale_price) {{ $product->sale_price }} @else NO @endif</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td>{{ $product->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.editproduct', ['slug' => $product->slug]) }}"><i class="fa fa-edit fa-2x text-info"></i> </a>
                                                            <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{ $product->id }})"><i class="fa fa-times fa-2x text-danger" style="margin-left: 10px 0;"></i> </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $products->links() }}
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

