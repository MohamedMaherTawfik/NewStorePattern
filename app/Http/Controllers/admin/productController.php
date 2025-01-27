<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\services\ProductServices;
use Illuminate\Http\Request;

class productController extends Controller
{
    private $productServices;
    public function __construct(ProductServices $productServices){
        $this->productServices=$productServices;
    }

    public function index(){
        return $this->productServices->getProducts();
    }

    public function show($id){
        return $this->productServices->getProduct($id);
    }

    public function store(productRequest $request){
        return $this->productServices->store($request);
    }

    public function update($id,productRequest $request){
        return $this->productServices->update($id,$request);
    }

    public function destroy($id){
        return $this->productServices->destroy($id);
    }
}
