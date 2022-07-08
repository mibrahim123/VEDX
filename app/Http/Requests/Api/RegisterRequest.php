<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Rules\PhoneNoCountryCodeValidation;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        $validationRule = [
            'role' => 'required',
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'email' => 'required|email|unique:users,email|max:255',
            'gender' => 'required|'.Rule::in([0, 1, 2]),
            'password' => ['required', 'string', $this->passwordRules()],
            'skills' => 'required|',
            'new_skills' => 'nullable',
            'location' => 'required|max:150',
            'category' => 'required|exists:categories,id',
            'sub_category' => 'required|exists:categories,id',
            'phone' => [
                'required',
                'numeric',
                'digits_between:7,13',
                app()->makeWith(PhoneNoCountryCodeValidation::class, ['id' => ''])
            ]
        ];

        if(request()->role == 'student') {
            $validationRule = array_merge(
                $validationRule,
                [
                    'school' => 'required|max:150',
                    'grade'=> 'required|max:150',
                    'curriculum'=> 'required|max:150',
                ]
            );
        }
        return $validationRule;
    }

    /**
     * Password Validation Rules
     *
     * @return Illuminate\Validation\Rules\Password
     */
    public function passwordRules()
    {
        return Password::min(8)
        ->mixedCase()
        ->letters()
        ->numbers()
        ->symbols();
        //->uncompromised();
    }
}
