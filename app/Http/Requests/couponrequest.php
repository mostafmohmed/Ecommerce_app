<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class couponrequest extends FormRequest
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
         'code'=>['required','min:4','max:10','unigue:coupons,code,'.$this->id],
         'discount_perecentage'=>['required','numeric','between:1,100'],
         'start_data'=>['required','data','after_or_equal:now'],
         'end_data'=>['required','data','after:start_data'],
         'limit'=>['required','numeric','min:1'],
         'is_active'=>['required','boolean'],
        ];
    }
}
