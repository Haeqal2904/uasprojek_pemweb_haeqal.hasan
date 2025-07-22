<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hubungi Kami - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .animate-fadeIn {
      animation: fadeIn 0.6s ease-out both;
    }

    .animate-slideInUp {
      animation: slideInUp 0.8s ease-out both;
    }

    .transition-input {
      transition: all 0.3s ease;
    }

    .transition-input:focus {
      outline: none;
      border-color: #fb923c;
      box-shadow: 0 0 0 3px rgba(251, 146, 60, 0.3);
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 animate-fadeIn">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="laporan.php" class="flex items-center space-x-2">
        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/toa-3026714-2526660.png" alt="Logo" class="w-8 h-8">
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
  <main class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10 animate-slideInUp">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Hubungi Kami</h2>
    <form id="formHubungi">
      <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full border rounded px-4 py-2 mb-4 transition-input" required>
      <input type="email" id="email" placeholder="Email" class="w-full border rounded px-4 py-2 mb-4 transition-input" required>
      <input type="text" id="subjek" placeholder="Subjek" class="w-full border rounded px-4 py-2 mb-4 transition-input" required>
      <textarea id="pesan" placeholder="Pesan Anda..." class="w-full border rounded px-4 py-2 mb-4 h-32 transition-input" required></textarea>
      <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded w-full transition">
        Kirim via WhatsApp
      </button>
    </form>
  </main>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 mt-12 animate-fadeIn">
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
      <a href="hubungi.php" class="hover:underline font-semibold text-orange-600">HUBUNGI KAMI</a>
    </div>
    <p class="mt-4 text-xs text-center text-gray-400">
      Copyright © 2025. Kantor Staf Presiden. Hak cipta dilindungi Undang-undang.
    </p>
  </footer>

  <!-- Script WhatsApp -->
  <script>
    document.getElementById("formHubungi").addEventListener("submit", function (e) {
      e.preventDefault();
      const nama = document.getElementById("nama").value.trim();
      const email = document.getElementById("email").value.trim();
      const subjek = document.getElementById("subjek").value.trim();
      const pesan = document.getElementById("pesan").value.trim();

      const nomorAdmin = "6287881205314"; // Ganti dengan nomor admin kamu
      const teks = `Halo Admin,%0ASaya: ${nama} (%0AEmail: ${email})%0A%0ASubjek: ${subjek}%0APesan:%0A${pesan}`;
      const waUrl = `https://wa.me/${nomorAdmin}?text=${teks}`;

      window.open(waUrl, '_blank');
    });
  </script>
</body>
</html>
