<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\PesertaCalon;

class AnggotaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $ketua = Auth::guard('peserta')->user() ?? Auth::user();
        $id = (int) ($this->route('id') ?? $this->input('id'));
        if (! $ketua || ! $id) {
            return false;
        }
        $anggota = PesertaCalon::find($id);
        return $anggota && (int) $anggota->ketua_id === (int) $ketua->id;
    }

    public function rules(): array
    {
        $id = (int) ($this->route('id') ?? $this->input('id'));
        return [
            'id' => ['required', 'integer', Rule::exists('peserta_calon', 'id')],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:100', Rule::unique('peserta_calon', 'email')->ignore($id)],
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