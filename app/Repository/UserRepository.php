<?php

namespace App\Repository;

use App\Traits\HasCrud;
use App\Repository\Interfaces\CrudRepositoryInterface;

class UserRepository implements CrudRepositoryInterface
{

    protected $model = \App\Models\User::class;
    use HasCrud;

    public function register($data)
    {
        try {
            // if (!empty($fcm_token)) {
            //     $data['fcm_token'] = $fcm_token;
            // }

            // $ogPass = $data['password'];
            $data['password'] = \Hash::make($data['password']);
            // $data['phone_no'] = isset($data['phone_no_without_country_code']) ?
            // $data['phone_no_without_country_code'] :
            // $data['phone_no'];
            $user = $this->storeData($data);

            if (request()->wantsJson()) {
                $user['_token'] = $user->createToken("_token2");
            }

            return sendResponse($user);
        } catch (\Exception $e) {
            dd($e);
            return sendError(500, $e->getMessage());
        }
    }

    public function login()
    {

    }
}
