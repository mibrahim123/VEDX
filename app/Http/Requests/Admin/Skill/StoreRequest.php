<?php

namespace App\Http\Requests\Admin\Skill;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:150|regex:/^[\pL\pM\pN\s_-]+$/u',
            'status' => ['required','integer',Rule::in([0,1])],
        ];
    }

        /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.regex' => 'special character is not allowed'
        ];
    }
}
