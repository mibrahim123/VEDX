<?php

namespace App\Http\Responses\Fortify;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class SocialLoginResponse implements RegisterResponseContract
{


    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return redirect()->intended(
            \Auth::user()->type == 0
                ? route('user.dashboard')
                : route('vendor.listing.add')
        );
    }
}
