<?php

namespace App\services;

use App\Http\Requests\orderRequest;
use App\Interfaces\orderInterface;
use App\Models\cart;
use App\Models\orders;
use App\Models\orderItems;
use Exception;
use Illuminate\Support\Facades\Auth;

class orderServices
{
    use apiResponse;
    private orderInterface $orderInterface;

    public function __construct(orderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    public function create_order(orderRequest $request,$data)
    {
        try{
            $request->validated();
            $order=orders::create([
                'user_id'=>Auth::user()->id,
                'address'=>request('address'),
                'total'=>request('total'),
                'details'=>request('details'),
            ]);

        $order_items=cart::with('products')->where('user_id', auth()->user()->id)->first();
        foreach($order_items as $item){
            foreach($item->products as $product)
            {
                orderItems::create([
                    'orders_id'=>$order->id,
                    'products_id'=>$product->id,
                    'price'=>$product->price,
                    'quantity'=>$item->quantity,
                ]);
            }
            $order->load('orderItems');
            return $this->apiResponse($order, 'Order created successfully.',200);
        }
        }catch(Exception $e){
        return $this->apiResponse(null, $e->getMessage(),400);
            }
    }

    public function get_user_orders()
    {
        $data= $this->orderInterface->get_user_orders(Auth::user()->id);
        return $this->apiResponse($data, 'Orders fetched successfully.',200);
    }

    public function all_orders()
    {
        $data= $this->orderInterface->all_orders();
        return $this->apiResponse($data, 'Orders fetched successfully.',200);
    }

    public function get_order($id)
    {
        $order= $this->orderInterface->get_order($id);
        return $this->apiResponse($order, 'Order fetched successfully.',200);
    }

    public function change_order_status($id,$data)
    {
        $data= $this->orderInterface->update_order_status($id,$data);
        return $this->apiResponse($data, 'Order status updated successfully.',200);
    }

    public function delete_order($id)
    {
        $data= $this->orderInterface->delete_order($id);
        return $this->apiResponse($data, 'Order deleted successfully.',200);
    }
}


