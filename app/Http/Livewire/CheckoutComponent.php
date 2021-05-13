<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Transaction;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    // addres for billing
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line;
    public $city;
    public $country;
    public $zipcode;

    // address for shipping different address
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line;
    public $s_city;
    public $s_country;
    public $s_zipcode;

    //payment method
    public $paymentmode;

    // thank you for order
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|numeric',
            'line'     => 'required',
            'city'      => 'required',
            'country'   => 'required',
            'zipcode'   => 'required',
            'paymentmode' => 'required'
        ]);

        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname'  => 'required',
                's_email'     => 'required|email',
                's_mobile'    => 'required|numeric',
                's_line'     => 'required',
                's_city'      => 'required',
                's_country'   => 'required',
                's_zipcode'   => 'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|numeric',
            'line'     => 'required',
            'city'      => 'required',
            'country'   => 'required',
            'zipcode'   => 'required',
            'paymentmode' => 'required'
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname =     $this->firstname;
        $order->lastname  =     $this->lastname;
        $order->email     =     $this->email;
        $order->mobile    =     $this->mobile;
        $order->line     =     $this->line;
        $order->city      =     $this->city;
        $order->country   =     $this->country;
        $order->zipcode   =     $this->zipcode;

        $order->status    = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::getContent() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->quantity;
            $orderItem->save();
            $product = Product::find($item->id);
            if ($product->quantity > 0) {
                $product->quantity = $product->quantity - $item->quantity;
                if ($product->quantity <= 0) {
                    $product->stock_status = 'outofstock';
                }
            }
            $product->save();
        }

        if ($this->ship_to_different) {
            $this->validate([
                's_firstname' => 'required',
                's_lastname'  => 'required',
                's_email'     => 'required|email',
                's_mobile'    => 'required|numeric',
                's_line'     => 'required',
                's_city'      => 'required',
                's_country'   => 'required',
                's_zipcode'   => 'required',
            ]);

            $shipping = new Shipping();

            $shipping->order_id = $order->id;

            $shipping->firstname =     $this->s_firstname;
            $shipping->lastname  =     $this->s_lastname;
            $shipping->email     =     $this->s_email;
            $shipping->mobile    =     $this->s_mobile;
            $shipping->line     =     $this->s_line;
            $shipping->city      =     $this->s_city;
            $shipping->country   =     $this->s_country;
            $shipping->zipcode   =     $this->s_zipcode;

            $shipping->save();
        }

        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        } else {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'card';
            $transaction->status = 'pending';
            $transaction->save();
        }


        $this->thankyou = true;
        Cart::clear();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function mount()
    {
        if (Auth::user()) {
            $this->firstname = Auth::user()->name;
            $this->lastname = Auth::user()->name;
            $this->email = Auth::user()->email;
        }

        SEOTools::setTitle('Checkout | VCVS Book Store Group');
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
