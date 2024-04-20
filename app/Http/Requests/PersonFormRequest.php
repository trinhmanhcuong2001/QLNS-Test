<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonFormRequest extends FormRequest
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
            'full_name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
        ];
    }

    public function messages(){
        return [
            'full_name' => 'Không được để trống họ tên',
            'phone_number' => 'Không được để trống số điện thoại',
            'birthdate' => 'Không được để trống ngày sinh',
            'address' => 'Không được để trống địa chỉ'
        ];
    }
}
