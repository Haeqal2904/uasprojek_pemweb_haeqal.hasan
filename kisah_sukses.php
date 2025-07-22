<?php
session_start();
require_once 'koneksi.php';

// Ambil semua laporan yang sudah selesai
$query = "SELECT * FROM laporan WHERE selesai = 1 ORDER BY id DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kisah Sukses - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to right, #ff8c42, #ff3c38);
    }

    @keyframes slideFadeDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes zoomIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .animate-slideFadeDown {
      animation: slideFadeDown 0.6s ease-out forwards;
    }

    .animate-zoomIn {
      animation: zoomIn 0.6s ease-out forwards;
    }

    .animate-fadeIn {
      animation: fadeIn 0.8s ease both;
    }

    .animate-slideUp {
      animation: slideUp 0.8s ease-out forwards;
    }
  </style>
</head>
<body class="text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 animate-slideFadeDown">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="laporan.php" class="flex items-center space-x-2">
        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8 animate-bounce">
        <span class="text-xl font-bold text-orange-600">CEPUIN!</span>
      </a>
      <div class="space-x-4 hidden md:flex">
        <a href="tentang.php" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>
        <a href="faq.php" class="text-gray-700 hover:text-orange-600 transition">FAQ</a>
        <a href="laporan-saya.php" class="text-gray-700 hover:text-orange-600 transition">Laporan Saya</a>
        <a href="logout.php" class="text-white bg-orange-600 hover:bg-orange-700 px-3 py-1 rounded transition">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <main class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center text-white mb-10 animate-zoomIn">Kisah Sukses</h1>

    <?php if ($result->num_rows > 0): 
      $delay = 0;
      while ($row = $result->fetch_assoc()): ?>
        <div class="bg-white p-5 mb-6 rounded-xl shadow relative border border-orange-100 animate-fadeIn" style="animation-delay: <?= $delay ?>s;">
          <h2 class="font-semibold text-lg mb-2 text-orange-600"><?= htmlspecialchars($row['judul']) ?></h2>
          <p class="text-sm text-gray-700 mb-3"><?= htmlspecialchars(substr($row['isi'], 0, 200)) ?>...</p>
          <div class="text-xs text-gray-500 flex justify-between">
            <span><?= htmlspecialchars($row['tanggal']) ?> - <?= htmlspecialchars($row['lokasi']) ?></span>
            <span>Tujuan: <?= htmlspecialchars($row['tujuan']) ?></span>
          </div>
          <img src="gambar/selesai.png" alt="Selesai" class="absolute top-4 right-4 w-14 opacity-80">
        </div>
      <?php $delay += 0.2; endwhile; ?>
    <?php else: ?>
      <p class="text-center text-gray-600 bg-white rounded-md py-6 shadow animate-fadeIn">Belum ada kisah sukses yang ditampilkan.</p>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 animate-slideUp">
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
    <div class="mt-6 flex flex-wrap justify-center gap-4 text-gray-500 text-xs">
      <a href="kebijakan_privasi.php" class="hover:underline">PRIVACY</a>
      <a href="#" class="hover:underline">BERANDA</a>
      <a href="#" class="hover:underline">BLOG</a>
      <a href="kisah_sukses.php" class="hover:underline">KISAH SUKSES</a>
      <a href="ketentuan_layanan.php" class="hover:underline">KETENTUAN LAYANAN</a>
      <a href="tentang.php" class="hover:underline">TENTANG KAMI</a>
      <a href="tutorial_video.php" class="hover:underline">TUTORIAL VIDEO</a>
      <a href="hubungi.php" class="hover:underline">HUBUNGI KAMI</a>
    </div>
    <p class="mt-4 text-xs text-center text-gray-400">
      Copyright © 2025. Kantor Staf Presiden. Hak cipta dilindungi Undang-undang.
    </p>
  </footer>

</body>
</html>
