<?php

namespace App\Repository;

use App\Models\orders;
use App\Interfaces\orderInterface;
use App\Models\User;

class orderRepository implements orderInterface
{
    public function create_order($data)
    {
        return orders::create($data);
    }

    public function all_orders()
    {
        return orders::all();
    }

    public function get_order($id)
    {
        return orders::with('orderItems')->find($id);
    }

    public function update_order_status($id,$data)
    {
        $order = orders::find($id);
        $order->update($data);
        return $order;
    }

    public function delete_order($id)
    {
        return orders::destroy($id);
    }

    public function get_user_orders($id)
    {
        return User::with('orders','orders.orderItems')->find($id);
    }
}
