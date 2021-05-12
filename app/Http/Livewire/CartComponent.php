<?php

namespace App\Http\Livewire;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, ['quantity' => $qty]);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, ['quantity' => $qty]);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destory($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Item has been remove!');
    }

    public function destroyAll()
    {
        Cart::clear();
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function checkout()
    {
        if (Auth::check())
        {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (!Cart::getContent()->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout', [
           'subtotal' => Cart::getSubTotal(),
            'total' => Cart::getTotal()
        ]);
    }

    public function mount()
    {
        SEOTools::setTitle('Cart');
    }
    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
