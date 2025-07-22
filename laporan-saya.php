<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Silakan login terlebih dahulu.'); window.location.href='login.php';</script>";
  exit;
}
$user_id = $_SESSION['user_id'];

$laporan = [];
$stmt = $conn->prepare("SELECT * FROM laporan WHERE user_id = ? ORDER BY tanggal DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $laporan[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Laporan Saya - CEPUIN!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#ff7b00",
            dark: "#1f2937",
          }
        }
      }
    };
  </script>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
      from { transform: translateY(40px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease-out forwards;
    }
    .animate-slideUp {
      animation: slideUp 0.6s ease-out forwards;
    }
  </style>
</head>
<body class="bg-primary text-white font-sans min-h-screen flex flex-col animate-fadeIn">

<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <a href="laporan.php" class="flex items-center space-x-2">
        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8 animate-bounce">
        <span class="text-xl font-bold text-orange-600">CEPUIN!</span>
      </a>
    </div>
    <div class="space-x-4 hidden md:flex">
      <a href="tentang.php" class="text-gray-700 hover:text-orange-600 transition duration-300">Tentang</a>
      <a href="faq.php" class="text-gray-700 hover:text-orange-600 transition duration-300">FAQ</a>
      <a href="laporan-saya.php" class="text-gray-700 hover:text-orange-600 transition duration-300">Laporan Saya</a>
      <a href="logout.php" class="text-white bg-orange-600 hover:bg-orange-700 px-3 py-1 rounded transition duration-300">Logout</a>
    </div>
  </div>
</nav>

<!-- Konten -->
<main class="w-full px-4 py-6 flex-grow">
  <div class="max-w-6xl mx-auto">
    <div class="bg-white text-gray-800 rounded-2xl shadow-xl p-8">
      <h2 class="text-3xl font-bold mb-6 border-b pb-4">📋 Laporan Saya</h2>

      <?php if (empty($laporan)): ?>
        <p class="text-gray-500">Tidak ada laporan yang ditemukan.</p>
      <?php else: foreach ($laporan as $lapor): ?>
        <div class="border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-lg transition duration-500 mb-6 bg-white animate-slideUp">
          <h3 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($lapor['judul']) ?></h3>
          <p class="mt-2 text-gray-600"><?= nl2br(htmlspecialchars($lapor['isi'])) ?></p>

          <div class="text-sm mt-3 text-gray-500 space-y-1">
            <p><strong>Tanggal:</strong> <?= htmlspecialchars($lapor['tanggal']) ?> | <strong>Lokasi:</strong> <?= htmlspecialchars($lapor['lokasi']) ?></p>
            <p><strong>Kategori:</strong> <?= htmlspecialchars($lapor['kategori']) ?> | <strong>Jenis:</strong> <?= htmlspecialchars($lapor['jenis']) ?></p>
            <p><strong>Tujuan:</strong> <?= htmlspecialchars($lapor['tujuan']) ?> | <strong>Privasi:</strong> <?= htmlspecialchars($lapor['privasi']) ?></p>
          </div>

          <?php if (!empty($lapor['foto'])): ?>
            <img src="<?= htmlspecialchars($lapor['foto']) ?>" alt="Lampiran" class="mt-4 w-52 rounded-md shadow-md">
          <?php endif; ?>

          <?php if (!empty($lapor['tanggapan'])): ?>
            <p class="mt-3 text-sm text-gray-700"><strong>Tanggapan Petugas:</strong> <?= htmlspecialchars($lapor['tanggapan']) ?></p>
          <?php endif; ?>

          <span class="inline-block mt-4 text-white text-sm px-4 py-1 rounded
            <?= $lapor['selesai'] ? 'bg-green-600' : 'bg-red-600' ?>">
            Status: <?= $lapor['selesai'] ? 'Selesai' : 'Belum diproses' ?>
          </span>
        </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 animate-fade-in">
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
