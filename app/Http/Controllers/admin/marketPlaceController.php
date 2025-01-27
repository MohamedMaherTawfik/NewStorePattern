<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashbaordRequest;
use App\services\MarketplaceServices;
use Illuminate\Http\Request;

class marketPlaceController extends Controller
{
    private $marketPlaceServices;
    public function __construct(MarketplaceServices $marketPlaceServices){
        $this->marketPlaceServices=$marketPlaceServices;
    }

    public function index(){
        return $this->marketPlaceServices->getmarkets();
    }

    public function show($id){
        return $this->marketPlaceServices->getMarket($id);
    }

    public function products($id){
        return $this->marketPlaceServices->getMarketProducts($id);
    }

    public function destroy($id){
        return $this->marketPlaceServices->destroy($id);
    }

    public function store(DashbaordRequest $request){
        return $this->marketPlaceServices->store($request);
    }

    public function update(DashbaordRequest $request,$id){
        return $this->marketPlaceServices->update($id,$request);
    }

}


