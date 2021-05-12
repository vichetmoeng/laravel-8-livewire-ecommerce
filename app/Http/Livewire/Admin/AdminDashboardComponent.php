<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('Admin');
    }
    public function render()
    {
        $allOrders = Order::all()->count();
        $allCat = Category::all()->count();
        $allProduct = Product::all()->count();
        $allUsers = User::all()->count();
        return view('livewire.admin.admin-dashboard-component', [
            'allOrders' => $allOrders,
            'allCat' => $allCat,
            'allProduct' => $allProduct,
            'allUsers' => $allUsers
        ])->layout('layouts.base');
    }
}
