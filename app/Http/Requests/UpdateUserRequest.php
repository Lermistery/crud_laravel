<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'nama' => 'required|string|max:100',
            'username' => ['required', 'string', 'max:250', Rule::unique('users')->ignore($this->id)],
            'pass' => 'nullable|string|min:6',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 100 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username maksimal 250 karakter',
            'username.unique' => 'Username sudah terdaftar',
            'pass.min' => 'Password minimal 6 karakter',
            'id_jabatan.required' => 'Jabatan wajib diisi',
            'id_jabatan.exists' => 'Jabatan tidak valid'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
}
