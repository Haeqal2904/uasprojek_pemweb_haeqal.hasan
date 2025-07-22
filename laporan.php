<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'masyarakat') {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location.href='pengaduanmasyrakat.php';</script>";
  exit;
}
require_once 'koneksi.php';

$showSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $jenis = $_POST['jenis'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $tujuan = $_POST['tujuan'];
  $kategori = $_POST['kategori'];
  $privasi = isset($_POST['privasi']) ? implode(', ', $_POST['privasi']) : '';
  $foto = '';

  if (!empty($_FILES['lampiran']['name'])) {
    $nama_file = basename($_FILES['lampiran']['name']);
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true);
    }
    $target_file = $target_dir . time() . "_" . $nama_file;
    if (move_uploaded_file($_FILES['lampiran']['tmp_name'], $target_file)) {
      $foto = $target_file;
    }
  }

  $stmt = $conn->prepare("INSERT INTO laporan (user_id, jenis, judul, isi, tanggal, lokasi, tujuan, kategori, privasi, foto, selesai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
  $stmt->bind_param("isssssssss", $user_id, $jenis, $judul, $isi, $tanggal, $lokasi, $tujuan, $kategori, $privasi, $foto);

  if ($stmt->execute()) {
    $showSuccess = true;
  } else {
    echo "<script>alert('Terjadi kesalahan saat menyimpan laporan.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CEPUIN! - Layanan Pengaduan Online Rakyat</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to right, #ff8c42, #ff3c38);
    }
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
      animation: fade-in 0.5s ease-out;
    }
    .toast {
      position: fixed;
      top: 1rem;
      right: 1rem;
      background-color: #16a34a;
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      animation: fade-in 0.5s ease-out;
      z-index: 9999;
    }

    .tooltip-container {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }

    .tooltip-text {
      visibility: hidden;
      width: max-content;
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 6px 10px;
      border-radius: 6px;
      position: absolute;
      z-index: 10;
      bottom: 150%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 12px;
      white-space: nowrap;
    }

    .tooltip-container:hover .tooltip-text {
      visibility: visible;
      opacity: 1;
    }

    .tooltip-text::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #333 transparent transparent transparent;
    }
  </style>
</head>
<body class="text-white">

<?php if ($showSuccess): ?>
  <div class="toast">✅ Laporan berhasil dikirim!</div>
  <script>
    setTimeout(() => {
      window.location.href = "laporan-saya.php";
    }, 2000);
  </script>
<?php endif; ?>

<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50 fade-in">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8">
      <span class="text-xl font-bold text-orange-600">CEPUIN!</span>
    </div>
    <div class="space-x-4 hidden md:flex">
      <a href="tentang.php" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>
      <a href="faq.php" class="text-gray-700 hover:text-orange-600 transition">FAQ</a>
      <a href="laporan-saya.php" class="text-gray-700 hover:text-orange-600 transition">Laporan Saya</a>
      <a href="logout.php" class="text-white bg-orange-600 hover:bg-orange-700 px-3 py-1 rounded transition">Logout</a>
    </div>
  </div>
</nav>

<!-- Header -->
<header class="text-center py-10 fade-in">
  <h1 class="text-3xl md:text-4xl font-bold">Layanan Aspirasi & Pengaduan Online Warga DKI Jakarta</h1>
  <p class="mt-2 text-lg text-white/80">Sampaikan laporan Anda langsung ke instansi yang berwenang</p>
</header>

<!-- Form -->
<main class="max-w-2xl mx-auto bg-white text-black p-8 rounded-2xl shadow-xl mb-16 fade-in">
  <h2 class="text-xl font-semibold mb-6 text-center">Sampaikan Laporan Anda</h2>
  <form method="post" enctype="multipart/form-data" class="space-y-5">
    <div>
      <label class="block font-medium mb-1">Klasifikasi Laporan</label>
      <div class="flex flex-wrap gap-4">
        <label><input type="radio" name="jenis" value="Pengaduan" checked> Pengaduan</label>
        <label><input type="radio" name="jenis" value="Aspirasi"> Aspirasi</label>
        <label><input type="radio" name="jenis" value="Permintaan Informasi"> Permintaan Informasi</label>
      </div>
    </div>
    <div>
      <label class="block font-medium">Judul Laporan</label>
      <input name="judul" type="text" class="w-full p-2 border rounded" required>
    </div>
    <div>
      <label class="block font-medium">Isi Laporan</label>
      <textarea name="isi" rows="4" class="w-full p-2 border rounded" required></textarea>
    </div>
    <div>
      <label class="block font-medium">Tanggal Kejadian</label>
      <input type="date" name="tanggal" class="w-full p-2 border rounded" required>
    </div>
    <div>
      <label class="block font-medium">Lokasi Kejadian</label>
      <select name="lokasi" class="w-full p-2 border rounded" required>
        <option disabled selected>Pilih Lokasi</option>
        <option>Jakarta Selatan</option>
        <option>Jakarta Barat</option>
        <option>Jakarta Pusat</option>
        <option>Jakarta Timur</option>
      </select>
    </div>
    <div>
      <label class="block font-medium">Lampiran Foto (opsional)</label>
      <input type="file" name="lampiran" accept="image/*" class="w-full p-2 border rounded">
    </div>
    <div>
      <label class="block font-medium">Instansi Tujuan</label>
      <input type="text" name="tujuan" class="w-full p-2 border rounded" required>
    </div>
    <div>
      <label class="block font-medium">Kategori Laporan</label>
      <select name="kategori" class="w-full p-2 border rounded" required>
        <option disabled selected>Pilih Kategori</option>
        <option>Ketertiban Umum</option>
        <option>Infrastruktur</option>
        <option>Lingkungan Hidup & Kebersihan</option>
        <option>Perhubungan & Transportasi</option>
      </select>
    </div>
    <div>
      <label class="block font-medium mb-1">Privasi</label>
      <div class="flex gap-6">
        <div class="tooltip-container">
          <label><input type="checkbox" name="privasi[]" value="Anonim"> Anonim</label>
          <div class="tooltip-text">Nama Anda tidak akan terpublikasi pada laporan</div>
        </div>
        <div class="tooltip-container">
          <label><input type="checkbox" name="privasi[]" value="Rahasia"> Rahasia</label>
          <div class="tooltip-text">Identitas hanya diketahui oleh admin</div>
        </div>
      </div>
    </div>
    <button type="submit" class="w-full py-2 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded transition">KIRIM LAPORAN</button>
  </form>
</main>

<!-- Footer -->
<footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 fade-in">
  <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-3 text-center md:text-left">
    <div>
      <p class="font-semibold mb-2">Dikelola oleh</p>
      <div class="flex justify-center md:justify-start gap-6 flex-wrap">
        <img src="gambar/pemprov.png" class="h-10" alt="Logo Pemprov">
        <img src="gambar/dishub.png" class="h-10" alt="Logo Dishub">
        <img src="gambar/dinas komunikasi.jpeg" class="h-9" alt="Logo Dinas Komunikasi">
      </div>
    </div>
    <div></div>
    <div class="md:text-right">
      <p class="font-semibold mb-2">Lebih dekat dengan kami</p>
      <div class="flex justify-center md:justify-end gap-9 text-lg">
        <a href="https://twitter.com" target="_blank" title="Twitter">
          <img src="gambar/twit.png" alt="Twitter" class="h-6 w-6 hover:opacity-80">
        </a>
        <a href="https://www.instagram.com/cepuin_jakarta/" target="_blank" title="Instagram">
          <img src="gambar/ig.png" alt="Instagram" class="h-7 w-7 hover:opacity-80">
        </a>
        <a href="https://facebook.com" target="_blank" title="Facebook">
          <img src="gambar/pesbuk.png" alt="Facebook" class="h-7 w-7 hover:opacity-80">
        </a>
      </div>
    </div>
  </div>
  <div class="mt-6 flex flex-wrap justify-center gap-3 text-gray-500 text-xs">
    <a href="kebijakan_privasi.php" class="px-2 hover:underline">PRIVACY</a>
    <a href="#" class="px-2 hover:underline">BERANDA</a>
    <a href="#" class="px-2 hover:underline">BLOG</a>
    <a href="kisah_sukses.php" class="px-2 hover:underline">KISAH SUKSES</a>
    <a href="ketentuan_layanan.php" class="px-2 hover:underline">KETENTUAN LAYANAN</a>
    <a href="tentang.php" class="px-2 hover:underline">TENTANG KAMI</a>
    <a href="tutorial_video.php" class="px-2 hover:underline">TUTORIAL VIDEO</a>
    <a href="hubungi.php" class="px-2 hover:underline">HUBUNGI KAMI</a>
  </div>
  <p class="mt-4 text-xs text-center text-gray-400">
    Copyright © 2025. Kantor Staf Presiden. Hak cipta dilindungi Undang-undang.
  </p>
</footer>

</body>
</html>
