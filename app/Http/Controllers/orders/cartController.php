<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\cartRequest;
use App\Services\CartServices;

class cartController extends Controller
{
    private $cartServices;
    public function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }

    public function add_to_cart(cartRequest $request)
    {
        return $this->cartServices->add_to_cart($request);
    }

    public function get_cart()
    {
        return $this->cartServices->get_cart();
    }

    public function clear_cart()
    {
        return $this->cartServices->clear_cart();
    }

    public function remove_from_cart($id)
    {
        return $this->cartServices->remove_from_cart($id);
    }
}
