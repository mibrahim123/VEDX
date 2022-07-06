<?php

namespace App\Http\Responses\Fortify;

use App\Models\TempRegister;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{

    public function __construct(TempRegister $user)
    {
        $this->_user = $user;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if (sendOTP($this->_user)) {
            \Session::put('reg_user_id', $this->_user->id);
            return redirect()->route('verify', [ 'fcm_token' => $request->fcm_token]);
        }

        return back()
        ->withInput($request->input())
        ->with('error', 'Invalid Phone No');
    }
}
