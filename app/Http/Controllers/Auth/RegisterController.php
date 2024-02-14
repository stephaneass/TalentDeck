<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Utils\API\APIErrors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use APIErrors;

    function register_form(Request $request)
    {
        return view('auth.register');
    }

    function register(RegisterRequest $request)
    {//dd($request->all());
        $data = [
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        

        $result = User::addNew($data);

        dd("good");
    }
}
