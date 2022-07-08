<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class PhoneNoCountryCodeValidation implements Rule
{
     /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(User $user, $id)
    {
        $this->_id = $id;
        $this->_user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count = $this->_user->where([
            'phone' => request()->phone,
            'country_code' => request()->country_code
        ])->when(!empty($this->_id), function ($q) {
            $q->where('id', '!=', $this->_id);
        })->count();

        if ($count > 0) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Phone No Already Exist';
    }
}
