<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\PesertaCalon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileDataUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() || Auth::guard('peserta')->check();
    }

    public function rules(): array
    {
        $authUser = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
        $model = Auth::check() ? User::class : PesertaCalon::class;
        $nameField = Auth::check() ? 'name' : 'nama_lengkap';

        return [
            $nameField => ['required', 'string', 'max:100'],
            'no_telp' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:100', Rule::unique($model)->ignore($authUser->id)],
            'github' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'spesialisasi_id' => ['nullable', 'integer', Rule::exists('spesialisasi', 'id')],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if (Auth::guard('peserta')->check()) {
            $this->merge([
                'nama_lengkap' => $this->input('name'),
            ]);
        }
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