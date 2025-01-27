<?php

namespace App\services;

use App\Http\Requests\productRequest;
use App\Interfaces\ProductInterface;

class ProductServices
{
    use apiResponse;
    private $productRepository;
    public function __construct(ProductInterface $productInterface)
    {
        $this->productRepository = $productInterface;
    }
    public function getProducts()
    {
        $fields=$this->productRepository->index();
        return $this->apiResponse($fields, 'Products fetched successfully.',200);
    }

    public function getProduct($id)
    {
        $fields=$this->productRepository->show($id);
        return $this->apiResponse($fields, 'Product fetched successfully.',200);
    }

    public function store(productRequest $request)
    {
        $fields=$request->validated();
        $data=$this->productRepository->store($fields);
        return $this->apiResponse($data, 'Product Created successfully.',200);
    }

    public function update($id,productRequest $request)
    {
        $fields=$request->validated();
        $data=$this->productRepository->update($id,$fields);
        return $this->apiResponse($data, 'Product updated successfully.',200);
    }

    public function destroy($id)
    {
        $data=$this->productRepository->destroy($id);
        return $this->apiResponse($data, 'Product deleted successfully.',200);
    }
}
