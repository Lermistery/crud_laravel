<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJabatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_jabatan' => 'required|string|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'nama_jabatan.required' => 'Nama jabatan wajib diisi!',
            'nama_jabatan.max' => 'Nama jabatan maksimal 50 karakter!'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
}
