<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Utils\API\APIErrors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use APIErrors;

    function login_form(Request $request)
    {
        return view('auth.login');
    }

    function login(LoginRequest $request)
    {
        if(Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            return self::singleAPISuccess(['Authenticated successfuly']);
            
        }else{
            return self::singleAPIError(['Invalid login details.']);
            //session()->flash('error', 'Email ou mot de passe invalide.');
        }
    }
}
