<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:8',
        ];
    }
    public function messages(): array 
    {
        return [
            'email.required' => 'Không được để trống email',
            'password.required' => 'Không được để trống mật khẩu',
            'password.min' => 'Độ dài mật khẩu phải ít nhất 8 ký tự',
        ];
    }
}
