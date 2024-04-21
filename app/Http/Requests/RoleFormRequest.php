<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
            'role' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'role.required' => 'Không được để trống quyền',
            'role.description' => 'Không được để trống mô tả'
        ];
    }
}
