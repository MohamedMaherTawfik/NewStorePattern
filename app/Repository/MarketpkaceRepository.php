<?php

namespace App\Repository;

use App\Interfaces\MarketplaceInterface;
use App\Models\marketplace;

class MarketpkaceRepository implements MarketplaceInterface
{
    public function index()
    {
        return marketplace::all();
    }

    public function store($data)
    {
        return marketplace::create($data);
    }

    public function update($id, $data)
    {
        $marketplace = marketplace::findOrFail($id);
        return $marketplace->update($data);
    }

    public function destroy($id)
    {
        $marketplace = marketplace::findOrFail($id);
        return $marketplace->delete();
    }

    public function show($id)
    {
        $marketplace = marketplace::findOrFail($id);
        return $marketplace;
    }

    public function products($id)
    {
        return marketplace::findOrFail($id)->products;
    }
}
