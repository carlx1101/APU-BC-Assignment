<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = "/"; // Default value

        if (auth()->user()->role == 'admin'){
            $home = "/admin/home";
        }
        else if(auth()->user()->role == 'doctor'){
            $home = "/doctor/home";
        }
        else if(auth()->user()->role == 'patient'){
            $home = "/home";
        }
        return redirect()->intended($home);
    }
}
