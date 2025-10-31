<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    // Determine if we're dealing with a User or Peserta
    $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
    $model = Auth::check() ? User::class : Peserta::class;
    $nameField = Auth::check() ? 'name' : 'nama_lengkap';

        return [
            $nameField => ['required', 'string', 'max:255'],
            'no_telp' => Auth::guard('peserta')->check() ? ['nullable', 'string', 'max:20'] : [],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique($model)->ignore($user->id),
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // If this is an intern, map the name field
        if (Auth::guard('peserta')->check()) {
            $this->merge([
                'nama_lengkap' => $this->input('name'),
            ]);
        }
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
