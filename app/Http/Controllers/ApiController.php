<?php

namespace App\Http\Controllers;

use App\Services\GroupServices;
use App\Services\TovarSerivces;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ApiGroup(GroupServices $groupServices){
        return json_encode($groupServices->select());
    }

    public function ApiTovar(TovarSerivces $tovarSerivces){
        return json_encode($tovarSerivces->select());
    }

}
