<?php

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if (auth()->check()) {
            if (Auth::user()->hasRole(ROLE_ADMIN)) {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            } else if (Auth::user()->hasRole(ROLE_NURSES)) {
                return redirect(RouteServiceProvider::NURSES_HOME);
            } else if (Auth::user()->hasRole(ROLE_PATIENT)) {
                return redirect(RouteServiceProvider::PATIENT_HOME);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    }
}
