<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserServices{

    /**
     * Получаем текущего пользователя
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function SelectIdUser(){
        $user = Auth::user();
        return $user;
    }


    public function UpdateUser(Request $request){
        $user = Auth::user();
        $modelUser=User::find($user->id);
        $modelUser->name=$request->input('name');
        $modelUser->save();
    }

}