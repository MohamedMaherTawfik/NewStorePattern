<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

trait BaseController
{
    public function apiResponse($result=null, $message=null, $code = null)
    {
    	$array = [
            'message' => $message,
            'code'    => $code,
            'data'    => $result
        ];
        return response($array);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$array = [
            'success' => false,
            'message' => $error,
            'code'    => $code
        ];

        if(!empty($errorMessages)){
            $array['data'] = $errorMessages;
        }

        return response($array);
    }
}
