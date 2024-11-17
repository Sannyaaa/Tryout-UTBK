<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'data_universitas_id' => ['nullable', 'exists:data_universitas,id'], // Validasi untuk universitas pertama
            'second_data_universitas_id' => ['nullable', 'exists:data_universitas,id'], // Validasi untuk universitas kedua
            'user_id' => ['nullable', 'exists:users,id'], // Validasi untuk universitas kedua
            'phone' => ['nullable', 'string', 'max:15'], // Jika ada nomor telepon
            'status' => ['nullable', 'string'], // Jika ada nomor telepon
            'sekolah_id' => ['nullable', 'exists:sekolahs,id'], // Validasi untuk universitas kedua
            'teach' => ['required_if:role,mentor', 'nullable', 'string'],
            'achievements' => ['array'],
            'achievements.*' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'teach.required_if' => 'Bidang ajar wajib diisi untuk mentor.',
            'achievements.array' => 'Pencapaian harus berupa array.',
            'achievements.*.string' => 'Setiap pencapaian harus berupa teks.',
            'description.max' => 'Deskripsi maksimal 1000 karakter.',
        ];
    }

}
