<?php

namespace App\Repository;

use App\Interfaces\BrandInterface;
use App\Models\brands;

class brandRepository implements BrandInterface
{
    public function index()
    {
        return brands::all();
    }

    public function store($data)
    {
        return brands::create($data);
    }

    public function update($id, $data)
    {
        $brands = brands::findOrFail($id);
        return $brands->update($data);
    }

    public function destroy($id)
    {
        $brands = brands::findOrFail($id);
        return $brands->delete();
    }

    public function show($id)
    {
        $brands = brands::findOrFail($id);
        return $brands;
    }

    public function products($id)
    {
        $brands = brands::findOrFail($id);
        return $brands->products;
    }
}
