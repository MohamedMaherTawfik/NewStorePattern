<?php

namespace App\Interfaces;

interface orderInterface{
    public function create_order($data);
    public function all_orders();
    public function get_order($id);
    public function update_order_status($id,$data);
    public function delete_order($id);
    public function get_user_orders($id);
}
