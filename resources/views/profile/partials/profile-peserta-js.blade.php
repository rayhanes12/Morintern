<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formProfile');
  const btnTambah = document.getElementById('btnTambahAnggota');
  const anggotaContainer = document.getElementById('anggotaContainer');
  const template = document.getElementById('anggotaTemplate').innerHTML;
  const notifArea = document.getElementById('notifArea');
  let index = 0;

  // Tambah anggota baru (append form)
  btnTambah.addEventListener('click', () => {
    const newItem = template.replace(/__INDEX__/g, index++);
    anggotaContainer.insertAdjacentHTML('beforeend', newItem);
  });

  // Hapus anggota baru yang belum disimpan
  anggotaContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('hapusBaru')) {
      e.target.closest('.anggotaItem').remove();
    }
  });

  // Hapus anggota lama (dari database)
  anggotaContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('btnHapusAnggota')) {
      const id = e.target.dataset.id;
      if (!confirm('Hapus anggota ini?')) return;

      fetch(`/profile/anggota/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(res => res.json())
      .then(result => {
        if (result.success) {
          e.target.closest('.p-4').remove();
          showNotif('Anggota berhasil dihapus.', 'green');
        } else {
          showNotif(result.message || 'Gagal menghapus anggota.', 'red');
        }
      })
      .catch(() => showNotif('Terjadi kesalahan koneksi.', 'red'));
    }
  });

  // Submit form profil + anggota via AJAX
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    fetch('{{ route('profile.update') }}', {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.json())
    .then(result => {
      if (result.success) {
        showNotif('Data berhasil disimpan.', 'green');
        // Remove dynamic forms after successful save
        document.querySelectorAll('.anggotaItem').forEach(item => item.remove());
        index = 0;
        // Optionally reload to show updated anggota list
        setTimeout(() => window.location.reload(), 2000);
      } else {
        showNotif(result.message || 'Gagal menyimpan data.', 'red');
      }
    })
    .catch(() => showNotif('Terjadi kesalahan server.', 'red'));
  });

  // Fungsi notifikasi Tailwind
  function showNotif(msg, color = 'green') {
    notifArea.textContent = msg;
    notifArea.className = `mt-4 p-3 rounded text-white text-sm bg-${color}-500`;
    notifArea.classList.remove('hidden');
    setTimeout(() => notifArea.classList.add('hidden'), 4000);
  }
});
</script>
