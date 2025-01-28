<?php

namespace App\Interfaces;

use App\Models\cart;
use App\Models\cart_products;
use App\Models\products;
use Illuminate\Support\Facades\Auth;

class CartRepository implements cartInterface{

    protected $cart;

    public function __construct(cart $cart)
    {
        $this->cart = $cart;
    }
    public function clear_cart()
    {
        return $this->cart->where('user_id', Auth::user()->id)->first();
    }

    public function get_cart()
    {
        return $this->cart->with('products')->where('user_id', Auth::user()->id)->first();
    }

    public function remove_from_cart($id)
    {
        $findCart = $this->cart->where('user_id', Auth::user()->id)->first();
        return cart_products::where('cart_id', $findCart->id)->delete();

    }

}
