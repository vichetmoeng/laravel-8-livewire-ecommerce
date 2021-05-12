<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersComponent extends Component
{
    public function mount()
    {
        SEOTools::setTitle('Orders | VCVS Book Store Group');
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);
        return view('livewire.user.user-orders-component', ['orders' => $orders])->layout('layouts.base');
    }
}
