<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnggotaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() || Auth::guard('peserta')->check();
    }

    public function rules(): array
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'no_telp' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:100', Rule::unique('peserta_calon', 'email')],
            'github' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'spesialisasi_id' => ['nullable', 'integer', Rule::exists('spesialisasi', 'id')],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'validation failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}