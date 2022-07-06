<?php

namespace App\Http\Requests\Admin\SubCategory;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->method == 'POST') {
            $uniqueRule = 'unique:categories,slug,null,deleted_at,NULL';
        }
        else {
            $id = Category::where('slug', request()->sub_category)->firstOrFail();
            $uniqueRule = 'unique:categories,slug,'.$id.',id,deleted_at,NULL';
        }
        return [
            'parent_id' =>'required|exists:categories,id',
            'title' => 'required|string|max:150|regex:/^[\pL\pM\pN\s_-]+$/u',
            'slug' => 'required|string|regex:/^[\pL\pM\pN\_-]+$/u|',
            'is_show' => ['required','integer',Rule::in([0,1])],
            'is_active' => ['required','integer',Rule::in([0,1])],
            'image' => ['required', 'mimetypes:image/*'],
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
            'name.regex' => 'special character is not allowed',
            'slug.regex' => 'special character is not allowed'
        ];
    }
}
