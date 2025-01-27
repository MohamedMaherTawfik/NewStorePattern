<?php

namespace App\services;

use App\Http\Requests\DashbaordRequest;
use App\Interfaces\CategoreyInterface;


class categoreyServices
{
    use apiResponse;
    private CategoreyInterface $categoreyInterface;

    public function __construct(CategoreyInterface $categoreyInterface)
    {
        $this->categoreyInterface = $categoreyInterface;
    }

    public function index(){
        $fields=$this->categoreyInterface->index();
        return $this->apiResponse($fields, 'Categories fetched successfully.',200);
    }

    public function store(DashbaordRequest $request){
        $fields=$request->validated();
        $data=$this->categoreyInterface->store($fields);
        return $this->apiResponse($data, 'Category Created successfully.',200);
    }

    public function show($id){
        $data=$this->categoreyInterface->show($id);
        return $this->apiResponse($data, 'Category fetched successfully.',200);
    }

    public function update(DashbaordRequest $request,$id){
        $fields=$request->validated();
        $data=$this->categoreyInterface->update($id,$fields);
        return $this->apiResponse($data, 'Category updated successfully.',200);
    }

    public function destroy($id){
        $data=$this->categoreyInterface->destroy($id);
        return $this->apiResponse($data, 'Category deleted successfully.',200);
    }

    public function products($id){
        $data=$this->categoreyInterface->products($id);
        return $this->apiResponse($data, 'Products fetched successfully.',200);
    }
}
