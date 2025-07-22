<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ketentuan Layanan - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes zoomIn {
      0% { transform: scale(0.9); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    .animate-fadeIn {
      animation: fadeIn 0.6s ease-out;
    }

    .animate-zoomIn {
      animation: zoomIn 0.5s ease-out;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 animate-fadeIn">
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

  <!-- Header -->
  <header class="bg-orange-600 text-white py-10 text-center animate-zoomIn">
    <h1 class="text-3xl font-bold">Ketentuan Layanan</h1>
    <p class="mt-1 text-white/90">Harap membaca sebelum menggunakan layanan CEPUIN!</p>
  </header>

  <!-- Konten -->
  <main class="max-w-4xl mx-auto px-6 py-10 bg-white rounded-xl shadow-md -mt-6 animate-fadeIn">
    <section class="space-y-6 leading-relaxed text-gray-700">
      <p>Dengan menggunakan platform CEPUIN!, Anda menyetujui ketentuan berikut ini. Harap baca dengan cermat untuk memahami hak dan kewajiban Anda sebagai pengguna.</p>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">1. Kewajiban Pengguna</h2>
        <ul class="list-disc pl-6 space-y-1">
          <li>Menyediakan informasi yang benar dan tidak menyesatkan saat membuat laporan.</li>
          <li>Tidak menggunakan layanan untuk menyebarkan ujaran kebencian atau hoaks.</li>
          <li>Tidak menyalahgunakan platform untuk kepentingan pribadi, politik, atau bisnis ilegal.</li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">2. Hak Pengelola</h2>
        <ul class="list-disc pl-6 space-y-1">
          <li>Berhak menghapus laporan yang melanggar ketentuan atau hukum yang berlaku.</li>
          <li>Berhak mengubah atau menghentikan layanan sewaktu-waktu untuk pemeliharaan atau perbaikan.</li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">3. Privasi dan Keamanan</h2>
        <p>Data pribadi Anda dikelola sesuai <a href="kebijakan_privasi.php" class="text-blue-600 underline">Kebijakan Privasi</a> kami dan tidak akan dibagikan tanpa persetujuan Anda.</p>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-orange-600 mb-2">4. Batas Tanggung Jawab</h2>
        <p>CEPUIN! tidak bertanggung jawab atas keterlambatan penanganan laporan oleh instansi terkait. Kami bertindak sebagai perantara sistem penghubung masyarakat dengan pihak berwenang.</p>
      </div>

      <p class="text-sm text-gray-500 mt-6">Terakhir diperbarui: Juli 2025</p>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 text-sm border-t pt-4 pb-2 animate-fadeIn mt-10">
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

    <div class="mt-4 flex flex-wrap justify-center gap-3 text-gray-500 text-xs">
      <a href="kebijakan_privasi.php" class="px-2 hover:underline">PRIVACY</a>
      <a href="#" class="px-2 hover:underline">BERANDA</a>
      <a href="#" class="px-2 hover:underline">BLOG</a>
      <a href="kisah_sukses.php" class="px-2 hover:underline">KISAH SUKSES</a>
      <a href="ketentuan_layanan.php" class="px-2 hover:underline font-semibold text-orange-600">KETENTUAN LAYANAN</a>
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
