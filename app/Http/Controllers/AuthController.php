<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request){
        $user= DB::table('utilisateurs')->where([
                ['email', $request['email']],
                ['password',$request['password']],
            ])->first();
        if ($user){
            $userToken=Utilisateur::find($user->id);
            $token=$userToken->createToken('authToken')->accessToken;
           return [$token,$user];
        }else{
            return null;
        }
    }
}
