<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
          'category_id' => 'required',
          'name' => 'required',
          'description' => 'required',
          'price' => 'required',
          'discounted_price' => 'nullable|lt:price',
          'image' => 'required',
        ];

        if($request->method() == 'PUT'){
          $rules['image'] = 'nullable';
        }
        return $rules;
    }
}
