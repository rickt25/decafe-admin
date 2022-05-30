<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
          'name' => 'required',
          'description' => 'required',
          'icon' => 'required',
        ];

        if($request->method() == 'PUT'){
          $rules['icon'] = 'nullable';
        }
        return $rules;
    }
}
