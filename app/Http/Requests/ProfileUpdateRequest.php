<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\User;
use App\Models\PesertaCalon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $authUser = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
        $model = Auth::check() ? User::class : PesertaCalon::class;
        $nameField = Auth::check() ? 'name' : 'nama_lengkap';

        $rules = [
            $nameField => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique($model)->ignore($authUser->id)],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'github' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'spesialisasi_id' => ['nullable', 'integer', Rule::exists('spesialisasi', 'id')],
            'universitas_id' => ['nullable', 'string', 'max:255'],
            'jurusan_id' => ['nullable', 'string', 'max:255'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'cv' => ['nullable', 'file', 'mimes:zip', 'max:10240'],
            'surat' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        if ($this->has('anggota')) {
            $ketuaId = $authUser?->id;
            $rules = array_merge($rules, [
                'anggota' => ['array'],
                'anggota.*.id' => ['nullable', 'integer', Rule::exists('peserta_calon', 'id')->where('ketua_id', $ketuaId)],
                'anggota.*.nama_lengkap' => ['required', 'string', 'max:100'],
                'anggota.*.no_telp' => ['nullable', 'string', 'max:20'],
                'anggota.*.email' => ['nullable', 'email', 'max:100'],
                'anggota.*.github' => ['nullable', 'string', 'max:255'],
                'anggota.*.linkedin' => ['nullable', 'string', 'max:255'],
                'anggota.*.spesialisasi_id' => ['nullable', 'integer', Rule::exists('spesialisasi', 'id')],
            ]);
        }

        return $rules;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if (Auth::guard('peserta')->check()) {
            $this->merge([
                'nama_lengkap' => $this->input('name'),
            ]);
        }
    }

    public function authorize(): bool
    {
        return Auth::check() || Auth::guard('peserta')->check();
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



// namespace App\Http\Requests;

// use App\Models\User;
// use App\Models\Peserta;
// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Auth;

// class ProfileUpdateRequest extends FormRequest
// {
//     /**
//      * Aturan validasi tergantung jenis user (HRD/User atau Peserta).
//      */
//     public function rules(): array
//     {
//         // Tentukan apakah yang login adalah User (HRD/Admin) atau Peserta (Intern)
//         $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
//         $model = Auth::check() ? User::class : Peserta::class;
//         $nameField = Auth::check() ? 'name' : 'nama_lengkap';

//         return [
//             // Nama field berbeda tergantung guard
//             $nameField => ['required', 'string', 'max:255'],

//             // Email unik sesuai modelnya
//             'email' => [
//                 'required',
//                 'string',
//                 'lowercase',
//                 'email',
//                 'max:255',
//                 Rule::unique($model)->ignore($user->id),
//             ],

//             // Validasi tambahan untuk profil
//             'foto' => ['nullable', 'image', 'max:2048'], // maksimal 2MB
//             'jabatan' => Auth::check() ? ['nullable', 'string', 'max:255'] : [], // hanya HRD
//             'no_telp' => ['nullable', 'string', 'max:20'],
//             'alamat' => ['nullable', 'string', 'max:1000'],
//         ];
//     }

//     /**
//      * Ubah input sebelum validasi agar sinkron untuk Peserta.
//      */
//     protected function prepareForValidation(): void
//     {
//         // Jika yang login adalah Peserta, map input name → nama_lengkap
//         if (Auth::guard('peserta')->check()) {
//             $this->merge([
//                 'nama_lengkap' => $this->input('name'),
//             ]);
//         }
//     }

//     /**
//      * Pesan error custom (opsional tapi user-friendly).
//      */
//     public function messages(): array
//     {
//         return [
//             'name.required' => 'Nama lengkap wajib diisi.',
//             'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
//             'email.required' => 'Email wajib diisi.',
//             'email.email' => 'Format email tidak valid.',
//             'email.unique' => 'Email ini sudah digunakan.',
//             'foto.image' => 'File yang diunggah harus berupa gambar.',
//             'foto.max' => 'Ukuran foto maksimal 2MB.',
//             'jabatan.max' => 'Jabatan maksimal 255 karakter.',
//             'no_telp.max' => 'Nomor telepon maksimal 20 karakter.',
//             'alamat.max' => 'Alamat maksimal 1000 karakter.',
//         ];
//     }
// }
