<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->orderid = $order_id;
        SEOTools::setTitle('Admin');
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.admin-order-details-component', ['order' => $order])->layout('layouts.base');
    }
}
