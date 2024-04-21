<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentFormRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'company_id' => 'required',
            'parent_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Không được để trống mã công ty',
            'name.required' => 'Không được để trốn tên công ty',
            'company_id.required' => 'Vui lòng chọn công ty',
            'parent_id.required' => 'Vui lòng chọn phòng ban cha'
        ];
    }
}
