<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    //
    public function index()
    {
        $result = [];
        $message = 'OK';
        
        return $this->sendResponse($result, $message);
    }
}
