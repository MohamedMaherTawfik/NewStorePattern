<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use App\services\orderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderServices;
    public function __construct(orderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    public function create_order(orderRequest $request,$data)
    {
        return $this->orderServices->create_order($request,$data);
    }

    public function get_user_orders()
    {
        return $this->orderServices->get_user_orders();
    }

    public function all_orders()
    {
        return $this->orderServices->all_orders();
    }

    public function get_order($id)
    {
        return $this->orderServices->get_order($id);
    }

    public function change_order_status($id,$data)
    {
        return $this->orderServices->change_order_status($id,$data);
    }

    public function delete_order($id)
    {
        return $this->orderServices->delete_order($id);
    }
}
