<?php

namespace App\services;

use App\Http\Requests\DashbaordRequest;
use App\Interfaces\BrandInterface;

class brandServices
{
    use apiResponse;
    private BrandInterface $brandInterface;

    public function __construct(BrandInterface $brandInterface)
    {
        $this->brandInterface = $brandInterface;
    }

    public function getBrands()
    {
        $fields=$this->brandInterface->index();
        return $this->apiResponse($fields, 'Brands fetched successfully.',200);
    }

    public function getBrand($id)
    {
        $fields=$this->brandInterface->show($id);
        return $this->apiResponse($fields, 'Brand fetched successfully.',200);
    }

    public function store(DashbaordRequest $request)
    {
        $fields=$request->validated();
        $data=$this->brandInterface->store($fields);
        return $this->apiResponse($data, 'Brand Created successfully.',200);
    }

    public function update($id,DashbaordRequest $request)
    {
        $fields=$request->validated();
        $data=$this->brandInterface->update($id,$fields);
        return $this->apiResponse($data, 'Brand updated successfully.',200);
    }

    public function destroy($id)
    {
        $data=$this->brandInterface->destroy($id);
        return $this->apiResponse($data, 'Brand deleted successfully.',200);
    }

    public function products($id)
    {
        $fields=$this->brandInterface->products($id);
        return $this->apiResponse($fields, 'Products fetched successfully.',200);
    }
}
