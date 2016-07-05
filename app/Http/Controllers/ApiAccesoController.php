<?php

namespace App\Http\Controllers;

use App\ApiAcceso;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiAccesoController extends Controller
{
    use Helpers;


    public function __construct()
    {
        $this->modelo = new ApiAcceso();
    }
}
