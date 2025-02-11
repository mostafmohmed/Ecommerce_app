<?php

namespace App\Http\Requests;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class branderequest extends FormRequest
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
           'name.*'=>['required','max:20','string',UniqueTranslationRule::for('categories')->ignore($this->id)],
           'logo'=>['required','max:200'],
           'status'=>['required','in:1,0']
        ];
    }
}
