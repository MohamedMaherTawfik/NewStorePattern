<?php

namespace App\Interfaces;

interface cartInterface{

    public function remove_from_cart($id);
    public function get_cart();
    public function clear_cart();
}
