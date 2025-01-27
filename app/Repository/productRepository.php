<?php

namespace App\Repository;

use App\Interfaces\ProductInterface;
use App\Models\products;

class ProductRepository implements ProductInterface
{
    public function index()
    {
        return products::all();
    }

    public function store($data)
    {
        return products::create($data);
    }

    public function update($id, $data)
    {
        $products = products::findOrFail($id);
        return $products->update($data);
    }

    public function destroy($id)
    {
        $products = products::findOrFail($id);
        return $products->delete();
    }

    public function show($id)
    {
        $products = products::findOrFail($id);
        return $products;
    }
}
