<?php

namespace App\services;

use App\Http\Requests\DashbaordRequest;
use App\Interfaces\MarketplaceInterface;

class MarketplaceServices
{
    use apiResponse;
    private MarketplaceInterface $marketplaceRepository;
    public function __construct(MarketplaceInterface $marketplaceInterface)
    {
        $this->marketplaceRepository = $marketplaceInterface;
    }
    public function getmarkets()
    {
        $fields=$this->marketplaceRepository->index();
        return $this->apiResponse($fields, 'Markets fetched successfully.',200);
    }

    public function getmarket($id)
    {
        $fields=$this->marketplaceRepository->show($id);
        return $this->apiResponse($fields, 'Market fetched successfully.',200);
    }

    public function getmarketproducts($id)
    {
        $fields=$this->marketplaceRepository->products($id);
        return $this->apiResponse($fields, 'Products fetched successfully.',200);
    }

    public function store(DashbaordRequest $request)
    {
        $fields=$request->validated();
        $data=$this->marketplaceRepository->store($fields);
        return $this->apiResponse($data, 'Market created successfully.',200);
    }

    public function update($id,DashbaordRequest $request)
    {
        $fields=$request->validated();
        $data=$this->marketplaceRepository->update($id,$fields);
        return $this->apiResponse($data, 'Market updated successfully.',200);
    }

    public function destroy($id)
    {
        $data=$this->marketplaceRepository->destroy($id);
        return $this->apiResponse($data, 'Market deleted successfully.',200);
    }
}
