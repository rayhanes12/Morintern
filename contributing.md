# 🧭 Panduan Kontribusi ke Project Morintern

Terima kasih sudah ikut berkontribusi pada proyek **Morintern** 🙌  
Agar semua kerja tim tetap rapi dan mudah direview, mohon ikuti panduan berikut sebelum mengirim perubahan ke repository ini.

---

## ⚙️ 1. Setup Awal

1. Clone repository:
   ```bash
   git clone https://github.com/rayhanes12/Morintern.git
   cd Morintern

2. Install dependencies:
composer install
npm install

3. Copy file .env.example menjadi .env lalu ubah konfigurasi sesuai kebutuhan:
cp .env.example .env
php artisan key:generate

4. 🌱  Buat Branch Baru

Jangan langsung kerja di branch main.

Selalu buat branch baru berdasarkan jenis task-nya:

Jenis Pekerjaan	Format Branch	Contoh
Fitur Baru	feature/nama-fitur	feature/google-login
Perbaikan Bug	fix/nama-bug	fix/password-validation
Hotfix Mendesak	hotfix/nama-isu	hotfix/production-login

contoh : git checkout -b feature/google-login

5. Commit dengan Pesan yang Jelas

Gunakan format pesan commit yang deskriptif dan konsisten:
git commit -m "feat: menambahkan fitur login dengan Google"

Prefix umum:
feat: → fitur baru
fix: → perbaikan bug
refactor: → perbaikan struktur kode tanpa ubah fitur
docs: → perubahan dokumentasi
style: → format/tampilan
chore: → perubahan minor (config, deps, dll)

6. Push ke GitHub
Kirim branch kamu ke repository:
git push origin feature/google-login

7. Buat Pull Request (PR)
- Buka repository di GitHub:
- 👉 https://github.com/rayhanes12/Morintern
- Klik tombol “Compare & pull request”.
- Pilih target branch main.
- Tambahkan deskripsi singkat tentang perubahan kamu.
- Klik Create pull request.

8. Code Review & Merge
Minimal 1 reviewer harus Approve PR sebelum bisa di-merge.
Reviewer akan memberikan feedback langsung di halaman PR.
Setelah disetujui, PR akan di-merge ke branch main oleh maintainer.