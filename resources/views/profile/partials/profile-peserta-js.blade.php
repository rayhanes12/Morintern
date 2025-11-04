<script>
document.addEventListener('DOMContentLoaded', function() {
    const formProfile = document.getElementById('formProfile');
    const anggotaContainer = document.getElementById('anggotaContainer');
    const anggotaTemplate = document.getElementById('anggotaTemplate');
    const btnTambahAnggota = document.getElementById('btnTambahAnggota');

    btnTambahAnggota.addEventListener('click', function() {
        const clone = anggotaTemplate.content.cloneNode(true);
        anggotaContainer.appendChild(clone);
    });

    anggotaContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('btnHapusFormAnggota')) {
            e.target.closest('.anggota-form').remove();
        }
    });

    formProfile.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(formProfile);

        try {
            const response = await fetch("{{ route('profile.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const result = await response.json();
            if (result.status === 'success') {
                alert(result.message);
                document.querySelectorAll('.anggota-form').forEach(f => f.remove());
                renderAnggota(result.anggota);
            } else {
                alert(result.message || 'Terjadi kesalahan.');
            }
        } catch (error) {
            console.error(error);
            alert('Gagal menyimpan profil.');
        }
    });

    anggotaContainer.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btnHapusAnggota')) {
            const anggotaItem = e.target.closest('.anggota-item');
            const id = anggotaItem.dataset.id;
            if (!confirm('Hapus anggota ini?')) return;

            try {
                const response = await fetch(`/profile/anggota/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();
                if (result.status === 'success') {
                    anggotaItem.remove();
                } else {
                    alert('Gagal menghapus anggota.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi.');
            }
        }
    });

    anggotaContainer.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btnEditAnggota')) {
            const anggotaItem = e.target.closest('.anggota-item');
            const id = anggotaItem.dataset.id;
            const nama = prompt("Nama Lengkap:", anggotaItem.querySelector('p.font-semibold').innerText);
            if (!nama) return;

            try {
                const response = await fetch(`/profile/anggota/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ nama_lengkap: nama })
                });

                const result = await response.json();
                if (result.status === 'success') {
                    anggotaItem.querySelector('p.font-semibold').innerText = nama;
                } else {
                    alert(result.message || 'Gagal memperbarui anggota.');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat edit anggota.');
            }
        }
    });

    function renderAnggota(list) {
        anggotaContainer.innerHTML = '';
        list.forEach(a => {
            const el = document.createElement('div');
            el.className = "bg-white border rounded-lg shadow p-4 flex justify-between items-center anggota-item";
            el.dataset.id = a.id;
            el.innerHTML = `
                <div>
                    <p class="font-semibold text-gray-800">${a.nama_lengkap}</p>
                    <p class="text-sm text-gray-500">${a.email ?? ''} | ${a.no_telp ?? ''}</p>
                    <p class="text-sm text-gray-600 mt-1">Spesialisasi: <strong>${a.spesialisasi_id ?? '-'}</strong></p>
                </div>
                <div class="space-x-2">
                    <button class="btnEditAnggota bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</button>
                    <button class="btnHapusAnggota bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                </div>
            `;
            anggotaContainer.appendChild(el);
        });
    }
});
</script>
