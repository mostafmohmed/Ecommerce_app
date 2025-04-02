<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class produectrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name.*'=>['required','string','max:400'],
        //    'small_desc.*'=>['required','string'],
        //    'desc.*'=>['required','string','max:5000','min:5'],
           
        //   'status'=>['required','in 0,1'],
        
        //   'sku'           => ['required', 'string', 'max:30'],
        //   'category_id'   => ['required', 'exists:categories,id'],
        //   'brand_id'      => ['required', 'exists:brandes,id'],
        //   'available_for' => ['required', 'date'],
        //   'tags'         =>  ['required', 'string'],

        ];
    }
}
