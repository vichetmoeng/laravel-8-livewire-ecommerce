<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if ($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
            session()->flash('delivered', 'Order has been delivered');
        }
        else if ($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
            session()->flash('canceled', 'Order has been canceled');
        }
        $order->save();
    }
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-order-component', ['orders' => $orders])->layout('layouts.base');
    }
}
