<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('Dashboard');
    }
    public function render()
    {
        $ordersCount = Order::where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-dashboard-component', ['allOrders' => $ordersCount])->layout('layouts.base');
    }
}
