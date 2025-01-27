<?php

namespace App\Repository;

use App\Interfaces\CategoreyInterface;
use App\Models\categories;

class CategoreyRepository implements CategoreyInterface
{
    public function index()
    {
        return categories::all();
    }

    public function store($data)
    {
        return categories::create($data);
    }

    public function update($id, $data)
    {
        $categories = categories::findOrFail($id);
        return $categories->update($data);
    }

    public function destroy($id)
    {
        $categories = categories::findOrFail($id);
        return $categories->delete();
    }

    public function show($id)
    {
        $categories = categories::findOrFail($id);
        return $categories;
    }

    public function products($id)
    {
        $categories = categories::findOrFail($id);
        return $categories->products;
    }
}
