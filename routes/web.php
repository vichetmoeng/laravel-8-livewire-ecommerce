<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\Admin\AdminUsersComponent;
use App\Http\Livewire\Admin\AdminAddUserComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;
use App\Http\Livewire\User\UserAcountSettingComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class);
Route::get('/about', AboutusComponent::class)->name('aboutus');


Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/search', SearchComponent::class)->name('product.search');

// Route for Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/dashboard/admin', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/dashboard/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/dashboard/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/dashboard/admin/category/edit/{slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/dashboard/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/dashboard/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/dashboard/admin/product/edit/{slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/dashboard/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/dashboard/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/dashboard/admin/slider/edit/{id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/dashboard/admin/home/categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/dashboard/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/dashboard/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/dashboard/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/dashboard/admin/users', AdminUsersComponent::class)->name('admin.users');
    Route::get('/dashboard/admin/user/add', AdminAddUserComponent::class)->name('admin.adduser');
    Route::get('/dashboard/admin/user/edit/{user_id}', AdminEditUserComponent::class)->name('admin.edituser');
});

// Route for Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard/user', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('dashboard/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('dashboard/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('dashboard/user/setting', UserAcountSettingComponent::class)->name('user.setting');
    Route::get('/thanks', ThankyouComponent::class)->name('thankyou');
});
