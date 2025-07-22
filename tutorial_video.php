<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tutorial CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInLeft {
      from { transform: translateX(-100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    @keyframes zoomIn {
      from { transform: scale(0.9); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .animate-fadeIn {
      animation: fadeIn 0.6s ease-out;
    }

    .animate-slideInLeft {
      animation: slideInLeft 0.6s ease-out;
    }

    .animate-zoomIn {
      animation: zoomIn 0.6s ease-out;
    }
  </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 animate-fadeIn">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="laporan.php" class="flex items-center space-x-2">
        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8 animate-bounce">
        <span class="text-xl font-bold text-orange-600">CEPUIN!</span>
      </a>
      <div class="space-x-4 hidden md:flex">
        <a href="tentang.php" class="text-gray-700 hover:text-orange-600 transition duration-300">Tentang</a>
        <a href="faq.php" class="text-gray-700 hover:text-orange-600 transition duration-300">FAQ</a>
        <a href="laporan-saya.php" class="text-gray-700 hover:text-orange-600 transition duration-300">Laporan Saya</a>
        <a href="logout.php" class="text-white bg-orange-600 hover:bg-orange-700 px-3 py-1 rounded transition duration-300">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-orange-600 text-white py-6 px-4 text-center shadow-md animate-zoomIn">
    <h1 class="text-2xl font-bold">Tutorial Penggunaan CEPUIN!</h1>
    <p class="text-sm opacity-90 mt-1">Panduan cepat menggunakan sistem pengaduan publik</p>
  </header>

  <!-- Konten Utama -->
  <main class="flex-grow animate-fadeIn">
    <div class="max-w-7xl mx-auto px-4 py-6">
      <div class="flex bg-white rounded shadow overflow-hidden min-h-[550px]">
        <!-- Sidebar Tutorial Scrollable -->
        <div class="w-64 overflow-y-auto border-r bg-gray-50 animate-slideInLeft">
          <ul class="divide-y">
            <li><button onclick="loadVideo('dQw4w9WgXcQ', this)" class="w-full text-left px-4 py-3 hover:bg-orange-100 focus:bg-orange-200">Cara Melihat Notifikasi</button></li>
            <li><button onclick="loadVideo('jNQXAC9IVRw', this)" class="w-full text-left px-4 py-3 hover:bg-orange-100">Cara Kirim Laporan</button></li>
            <li><button onclick="loadVideo('Zi_XLOBDo_Y', this)" class="w-full text-left px-4 py-3 hover:bg-orange-100">Kelola Profil</button></li>
            <li><button onclick="loadVideo('e-ORhEE9VVg', this)" class="w-full text-left px-4 py-3 hover:bg-orange-100">Memberi Dukungan</button></li>
            <li><button onclick="loadVideo('xvFZjo5PgG0', this)" class="w-full text-left px-4 py-3 hover:bg-orange-100">Keluar dari Akun</button></li>
          </ul>
        </div>

        <!-- Konten Video -->
        <div class="flex-1 p-4 overflow-hidden animate-zoomIn">
          <h2 class="text-xl font-semibold mb-4">Tutorial: <span id="judulTutorial">Cara Melihat Notifikasi</span></h2>
          <div class="w-full aspect-video">
            <iframe id="videoFrame" class="w-full h-full rounded" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Tutorial" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 animate-fadeIn">
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
      <a href="tutorial_video.php" class="hover:underline font-semibold text-orange-600">TUTORIAL VIDEO</a>
      <a href="hubungi.php" class="hover:underline">HUBUNGI KAMI</a>
    </div>
    <p class="mt-4 text-xs text-center text-gray-400">
      Copyright © 2025. Kantor Staf Presiden. Hak cipta dilindungi Undang-undang.
    </p>
  </footer>

  <script>
    const judulMap = {
      'dQw4w9WgXcQ': 'Cara Melihat Notifikasi',
      'jNQXAC9IVRw': 'Cara Kirim Laporan',
      'Zi_XLOBDo_Y': 'Kelola Profil',
      'e-ORhEE9VVg': 'Memberi Dukungan',
      'xvFZjo5PgG0': 'Keluar dari Akun'
    };

    function loadVideo(id, el) {
      document.getElementById("videoFrame").src = `https://www.youtube.com/embed/${id}`;
      document.getElementById("judulTutorial").textContent = judulMap[id] || "Tutorial";

      // Highlight tombol aktif
      const buttons = document.querySelectorAll("ul button");
      buttons.forEach(btn => btn.classList.remove("bg-orange-200", "font-bold"));
      el.classList.add("bg-orange-200", "font-bold");
    }
  </script>
</body>
</html>
