<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashbaordRequest;
use App\services\categoreyServices;
use Illuminate\Http\Request;

class categoreyController extends Controller
{
    private $categoreyServices;
    public function __construct(categoreyServices $categoreyServices){
        $this->categoreyServices=$categoreyServices;
    }

    public function index(){
        return $this->categoreyServices->index();
    }

    public function show($id){
        return $this->categoreyServices->show($id);
    }

    public function store(DashbaordRequest $request){
        return $this->categoreyServices->store($request);
    }

    public function update(DashbaordRequest $request,$id){
        return $this->categoreyServices->update($request,$id);
    }

    public function destroy($id){
        return $this->categoreyServices->destroy($id);
    }

    public function products($id){
        return $this->categoreyServices->products($id);
    }
}
