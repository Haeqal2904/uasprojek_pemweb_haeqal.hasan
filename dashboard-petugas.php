<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'petugas') {
  header("Location: login.php");
  exit;
}
require_once 'koneksi.php';

// Ambil semua laporan dari database
$laporan = [];
$result = $conn->query("SELECT * FROM laporan ORDER BY tanggal DESC");
while ($row = $result->fetch_assoc()) {
  $laporan[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Petugas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .table-container {
      max-width: 1000px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-nav {
      margin-left: auto;
    }
    .foto-laporan {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
    textarea {
      font-size: 14px;
    }
    .alert-fixed {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      display: none;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center">
      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" width="30" height="30" class="me-2">
      CEPUIN! Dashboard Petugas
    </a>
    <div class="collapse navbar-collapse" id="navbarNavAlt">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="alert alert-success alert-fixed" id="notifSuccess">✅ Tanggapan berhasil dikirim!</div>

<div class="table-container">
  <h4 class="mb-4">Daftar Laporan Masuk</h4>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Tanggapan</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($laporan)): ?>
        <tr><td colspan="8" class="text-center">Belum ada laporan.</td></tr>
      <?php else: foreach ($laporan as $i => $lapor): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td>
            <?php if (!empty($lapor['foto'])): ?>
              <img src="<?= $lapor['foto'] ?>" alt="Foto" class="foto-laporan">
            <?php else: ?>-<?php endif; ?>
          </td>
          <td><?= htmlspecialchars($lapor['judul']) ?></td>
          <td><?= htmlspecialchars($lapor['tanggal']) ?></td>
          <td><?= htmlspecialchars($lapor['lokasi']) ?></td>
          <td><?= htmlspecialchars($lapor['isi']) ?></td>
          <td><?= ($lapor['selesai']) ? '✅ Selesai' : '⏳ Belum' ?></td>
          <td>
            <form class="formTanggapan" data-id="<?= $lapor['id'] ?>">
              <textarea class="form-control mb-2 textarea-tanggapan" rows="2" placeholder="Tulis tanggapan..."><?= htmlspecialchars($lapor['tanggapan']) ?></textarea>
              <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
              <?php if (empty($lapor['selesai'])): ?>
                <a href="tandai_selesai.php?id=<?= $lapor['id'] ?>" class="btn btn-sm btn-success mt-2">Tandai Selesai</a>
              <?php endif; ?>
            </form>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Kirim tanggapan via AJAX
  document.querySelectorAll(".formTanggapan").forEach(form => {
    form.addEventListener("submit", function(e) {
      e.preventDefault();
      const id = this.dataset.id;
      const textarea = this.querySelector(".textarea-tanggapan");
      const tanggapan = textarea.value.trim();

      if (tanggapan === "") {
        alert("Tanggapan tidak boleh kosong!");
        return;
      }

      fetch("tanggapi.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, tanggapan })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          textarea.value = "";
          showNotif();
        } else {
          alert("Gagal menyimpan tanggapan.");
        }
      });
    });
  });

  function showNotif() {
    const notif = document.getElementById("notifSuccess");
    notif.style.display = "block";
    setTimeout(() => notif.style.display = "none", 3000);
  }
</script>
</body>
</html>
