<?php

namespace App\Services;

use App\Http\Requests\cartRequest;
use App\Interfaces\cartInterface;
use App\Models\cart;
use App\Models\cart_products;
use App\Models\products;

class CartServices{
    use apiResponse;

    private cartInterface $cartInterface;

    public function __construct(cartInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    public function add_to_cart(cartRequest $request)
    {
        $products = products::findOrFail(request('products_id'));
        if(!$products){
            return $this->apiResponse(null, 'Product not found.',404);
        }
        $cart=cart::where('user_id', auth()->user()->id)->first();
        if(!$cart){
            $fields=$request->validated();
            if($fields)
            {
                $cart=cart::create([
                    'user_id' => auth()->user()->id,
                    'quantity' => request('quantity'),
                ]);
                cart_products::create([
                    'cart_id' => $cart->id,
                    'products_id' => request('products_id'),
                ]);
            }
            return $this->apiResponse($cart->products(), 'Product added to cart successfully.',200);
        }
        else{
            if(isset(cart_products::where('cart_id', $cart->id)->where('products_id', request('products_id'))->first()->id))
            {
                $cart->quantity++;
                $cart->save();
                return $this->apiResponse($cart->products(), 'Product quantity plused',200);
            }
            else{
                cart_products::create([
                    'cart_id' => $cart->id,
                    'products_id' => request('products_id'),
                ]);
                return $this->apiResponse($cart->products(), 'Product added to cart successfully.',200);
            }
        }
    }

    public function remove_from_cart($id)
    {
        $fields= $this->cartInterface->remove_from_cart($id);
        if($fields)
        {
            return $this->apiResponse(null, 'Product removed from cart successfully.',200);
        }
        return $this->apiResponse(null, 'Product not found.',404);
    }

    public function get_cart()
    {
        $cart= $this->cartInterface->get_cart();
        if($cart)
        {
            return $this->apiResponse($cart, 'Cart found successfully.',200);
        }
        return $this->apiResponse(null, 'Cart not found.',404);
    }

    public function clear_cart()
    {
        $cart=$this->cartInterface->clear_cart();
        if($cart)
        {
            $cart->delete();
            return $this->apiResponse(null, 'Cart cleared successfully.',200);
        }
        else{
            return $this->apiResponse(null, 'Cart not found.',404);
        }
    }
}
