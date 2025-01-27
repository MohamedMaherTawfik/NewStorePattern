<?php

namespace App\services;

trait apiResponse
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
}
