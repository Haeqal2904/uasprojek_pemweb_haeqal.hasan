<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kebijakan Privasi - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Animasi tambahan */
    @keyframes slideFadeDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-slideFadeDown {
      animation: slideFadeDown 0.6s ease-out forwards;
    }

    @keyframes zoomIn {
      0% { transform: scale(0.8); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
    .animate-zoomIn {
      animation: zoomIn 0.6s ease-out forwards;
    }

    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeUp {
      animation: fadeUp 0.7s ease-out forwards;
    }

    @keyframes slideUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-slideUp {
      animation: slideUp 0.7s ease-out forwards;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 animate-slideFadeDown">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <a href="laporan.php" class="flex items-center space-x-2">
          <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8 animate-bounce">
          <span class="text-xl font-bold text-orange-600">CEPUIN!</span>
        </a>
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
  <header class="bg-orange-600 text-white py-12 text-center animate-zoomIn">
    <h1 class="text-3xl font-bold">Kebijakan Privasi</h1>
    <p class="mt-2 text-white/90">Perlindungan data Anda adalah prioritas kami</p>
  </header>

  <!-- Konten -->
  <main class="max-w-4xl mx-auto px-6 py-12 bg-white rounded-xl shadow-md -mt-6 mb-10 animate-fadeUp">
    <section class="space-y-6 leading-relaxed text-gray-700">
      <p>CEPUIN! berkomitmen menjaga dan melindungi privasi seluruh pengguna. Kami menjelaskan bagaimana data Anda dikumpulkan, digunakan, dan dijaga keamanannya.</p>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">1. Informasi yang Kami Kumpulkan</h2>
        <ul class="list-disc pl-6 space-y-1">
          <li>Data akun seperti nama pengguna, email (jika diminta), dan password.</li>
          <li>Isi laporan seperti judul, lokasi, dan lampiran (foto).</li>
          <li>Data teknis seperti alamat IP, jenis perangkat, dan waktu akses.</li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">2. Penggunaan Data</h2>
        <ul class="list-disc pl-6 space-y-1">
          <li>Menindaklanjuti laporan yang Anda buat.</li>
          <li>Menghubungkan laporan ke instansi yang relevan.</li>
          <li>Meningkatkan keamanan dan performa sistem.</li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">3. Perlindungan Data</h2>
        <p>Kami menerapkan pengamanan teknis dan kebijakan internal untuk menjaga kerahasiaan dan integritas data Anda.</p>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">4. Hak Pengguna</h2>
        <ul class="list-disc pl-6 space-y-1">
          <li>Melihat atau mengoreksi data Anda.</li>
          <li>Meminta penghapusan data pribadi dari sistem.</li>
          <li>Menarik persetujuan terhadap pemrosesan data.</li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">5. Pembaruan Kebijakan</h2>
        <p>Kebijakan ini dapat diperbarui sewaktu-waktu. Kami akan mengumumkan setiap perubahan melalui halaman ini.</p>
      </div>

      <p class="text-sm text-gray-500 mt-6">Terakhir diperbarui: Juli 2025</p>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 mt-auto animate-slideUp">
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
      <a href="#" class="hover:underline">KETENTUAN LAYANAN</a>
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
