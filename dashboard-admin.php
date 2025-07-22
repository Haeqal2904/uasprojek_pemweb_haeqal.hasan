<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
  header('Location: index.html');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin - CEPUIN!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .dashboard-container {
      max-width: 1200px;
      margin: 60px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.6s ease-in-out;
    }
    h3, h5 {
      font-weight: 700;
    }
    .laporan-img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 6px;
    }
    .table thead th {
      background-color: #0d6efd;
      color: white;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
      background-color: #f9f9f9;
    }
    .btn:hover {
      transform: scale(1.02);
      transition: all 0.2s ease-in-out;
    }
    @keyframes fadeIn {
      0% {opacity: 0; transform: translateY(10px);}
      100% {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h3 class="mb-4 text-center text-primary">📊 Dashboard Administrator</h3>

    <div class="mb-5">
      <h5>📈 Statistik Sistem</h5>
      <ul id="statistik" class="list-group list-group-flush"></ul>
    </div>

    <div class="mb-5">
      <h5>👥 Tambah Pengguna Baru</h5>
      <form id="formTambahPengguna" class="row g-3">
        <div class="col-md-4">
          <input type="text" class="form-control" id="usernameBaru" placeholder="Username" required>
        </div>
        <div class="col-md-4">
          <select class="form-select" id="roleBaru">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
          </select>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-success w-100">+ Tambah Pengguna</button>
        </div>
      </form>
    </div>

    <div class="mb-5">
      <h5>👥 Daftar Pengguna</h5>
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>Username</th>
              <th>Role</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="tabelPengguna"></tbody>
        </table>
      </div>
    </div>

    <div class="mb-5">
      <h5>📝 Daftar Laporan</h5>
      <button class="btn btn-primary mb-3" onclick="exportCSV()">⬇ Unduh CSV</button>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Lokasi</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tabelLaporan"></tbody>
        </table>
      </div>
      <div id="pagination"></div>
    </div>

    <div class="text-end">
      <a href="logout.php" class="btn btn-outline-secondary">🔒 Logout</a>
    </div>
  </div>

  <script>
    let pengguna = [];
    let laporan = [];
    let currentPage = 1;
    const perPage = 5;

    document.addEventListener("DOMContentLoaded", function () {
      fetch("get_data.php")
        .then(res => res.json())
        .then(data => {
          pengguna = data.pengguna || [];
          laporan = data.laporan || [];
          tampilkanStatistik();
          tampilkanPengguna();
          tampilkanLaporan();
        });

      document.getElementById("formTambahPengguna").addEventListener("submit", function(e) {
        e.preventDefault();
        const username = document.getElementById("usernameBaru").value.trim();
        const role = document.getElementById("roleBaru").value;
        if (username === "") {
          alert("Username tidak boleh kosong!");
          return;
        }
        fetch("tambah_user.php", {
          method: "POST",
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, role })
        })
        .then(res => res.json())
        .then(res => {
          if (res.success) {
            alert("✅ Pengguna ditambahkan");
            location.reload();
          } else {
            alert("❌ Gagal tambah pengguna: " + res.message);
          }
        });
      });
    });

    function tampilkanStatistik() {
      const statistik = document.getElementById("statistik");
      const totalPengguna = pengguna.length;
      const totalPetugas = pengguna.filter(u => u.role === "petugas").length;
      const totalLaporan = laporan.length;
      statistik.innerHTML = `
        <li class="list-group-item">📄 Total Laporan: <strong>${totalLaporan}</strong></li>
        <li class="list-group-item">👤 Jumlah Pengguna: <strong>${totalPengguna}</strong></li>
        <li class="list-group-item">🛡️ Petugas Terdaftar: <strong>${totalPetugas}</strong></li>
      `;
    }

    function tampilkanPengguna() {
      const tabelPengguna = document.getElementById("tabelPengguna");
      if (pengguna.length === 0) {
        tabelPengguna.innerHTML = `<tr><td colspan="3" class="text-center">Tidak ada pengguna.</td></tr>`;
        return;
      }

      tabelPengguna.innerHTML = pengguna.map(user => `
        <tr>
          <td>${user.username}</td>
          <td>${user.role}</td>
          <td>${user.status || 'Aktif'}</td>
        </tr>
      `).join("");
    }

    function tampilkanLaporan() {
      const totalPages = Math.ceil(laporan.length / perPage);
      const tabelLaporan = document.getElementById("tabelLaporan");

      if (laporan.length === 0) {
        tabelLaporan.innerHTML = `<tr><td colspan="8" class="text-center">Tidak ada laporan.</td></tr>`;
        document.getElementById("pagination").innerHTML = '';
        return;
      }

      const start = (currentPage - 1) * perPage;
      const end = start + perPage;
      const pageData = laporan.slice(start, end);

      tabelLaporan.innerHTML = pageData.map((item, i) => `
        <tr>
          <td>${start + i + 1}</td>
          <td>${item.foto ? `<img src="${item.foto}" class="laporan-img">` : '-'}</td>
          <td>${item.judul}</td>
          <td>${item.tanggal}</td>
          <td>${item.lokasi}</td>
          <td>${item.isi}</td>
          <td>${item.selesai == 1 ? '✅ Selesai' : '⏳ Belum'}</td>
          <td><button class="btn btn-danger btn-sm" onclick="hapusLaporan(${item.id})">Hapus</button></td>
        </tr>
      `).join("");

      tampilkanPagination(totalPages);
    }

    function tampilkanPagination(totalPages) {
      let html = `
        <div class="d-flex justify-content-between align-items-center mt-3">
          <button class="btn btn-outline-primary ${currentPage === 1 ? 'disabled' : ''}" onclick="gantiHalaman(${currentPage - 1})">
            ⬅ Sebelumnya
          </button>
          <span class="text-muted">Halaman ${currentPage} dari ${totalPages}</span>
          <button class="btn btn-primary ${currentPage === totalPages ? 'disabled' : ''}" onclick="gantiHalaman(${currentPage + 1})">
            Selanjutnya ➡
          </button>
        </div>
      `;
      document.getElementById("pagination").innerHTML = html;
    }

    function gantiHalaman(halamanBaru) {
      currentPage = halamanBaru;
      tampilkanLaporan();
    }

    function hapusLaporan(id) {
      if (confirm("Yakin ingin menghapus laporan ini?")) {
        fetch(`hapus_laporan.php?id=${id}`)
          .then(res => res.json())
          .then(res => {
            if (res.success) {
              alert("✅ Laporan berhasil dihapus");
              location.reload();
            } else {
              alert("❌ Gagal hapus laporan");
            }
          });
      }
    }

    function exportCSV() {
      if (laporan.length === 0) return alert("Tidak ada data untuk diekspor.");
      let csv = "No,Judul,Tanggal,Lokasi,Keterangan,Status\n";
      laporan.forEach((item, i) => {
        csv += `${i + 1},"${item.judul}","${item.tanggal}","${item.lokasi}","${item.isi}","${item.selesai == 1 ? 'Selesai' : 'Belum'}"\n`;
      });

      const blob = new Blob([csv], { type: "text/csv" });
      const url = URL.createObjectURL(blob);
      const link = document.createElement("a");
      link.href = url;
      link.download = "laporan_pengaduan.csv";
      link.click();
      URL.revokeObjectURL(url);
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
