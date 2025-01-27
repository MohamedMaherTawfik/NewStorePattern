<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashbaordRequest;
use App\services\brandServices;
use Illuminate\Http\Request;

class brandController extends Controller
{
    private $brandServices;
    public function __construct(brandServices $brandServices){
        $this->brandServices=$brandServices;
    }

    public function index(){
        return $this->brandServices->getBrands();
    }

    public function show($id){
        return $this->brandServices->getBrand($id);
    }

    public function store(DashbaordRequest $request){
        return $this->brandServices->store($request);
    }

    public function update(DashbaordRequest $request,$id){
        return $this->brandServices->update($id,$request);
    }

    public function destroy($id){
        return $this->brandServices->destroy($id);
    }

    public function products($id){
        return $this->brandServices->products($id);
    }
}
