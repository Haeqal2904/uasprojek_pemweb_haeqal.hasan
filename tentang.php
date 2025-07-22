<?php
session_start();
// Jika kamu butuh login, bisa tambahkan pengecekan di sini
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tentang - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 1s ease-out forwards;
    }
    .fade-in-delayed {
      animation-delay: 0.5s;
    }
    .fade-in-late {
      animation-delay: 1s;
    }
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50 fade-in">
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

  <!-- Header Merah dengan Gelombang -->
  <div class="relative bg-orange-600 pb-20 fade-in">
    <div class="text-center pt-10 text-white fade-in">
      <h1 class="text-3xl font-bold animate-pulse">Apa Itu LAPOR!?</h1>
    </div>
    <svg class="absolute bottom-0 w-full" viewBox="0 0 1440 100" preserveAspectRatio="none">
      <path fill="#ffffff" fill-opacity="1" d="M0,64L1440,0L1440,320L0,320Z"></path>
    </svg>
  </div>

  <!-- Konten -->
  <div class="max-w-4xl mx-auto px-4 -mt-20 fade-in fade-in-delayed">
    <!-- Responsive Video Container -->
    <div class="flex justify-center mb-10 mt-16">
      <div class="w-full md:w-[80%] aspect-video rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105 duration-300">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
          title="YouTube video" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>

    <div class="text-justify text-gray-700 leading-relaxed space-y-4 fade-in fade-in-late">
      <p>Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik...</p>

      <p>Untuk itu Pemerintah Republik Indonesia membentuk Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SPAN) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat Indonesia melalui beberapa kanal pengaduan yaitu website <a href="https://www.lapor.go.id" target="_blank" class="text-blue-600 underline">www.lapor.go.id</a>, SMS 1708 (Telkomsel, Indosat, Three), Twitter @lapor1708 serta aplikasi mobile (Android dan iOS).</p>

      <p>Lembaga pengelola SPAN-LAPOR adalah Kementerian PANRB sebagai Pembina Pelayanan Publik, Kantor Staf Presiden (KSP) sebagai Pengelola Program Prioritas Nasional dan Ombudsman Republik Indonesia sebagai Pengawas Pelayanan Publik. LAPOR! telah ditetapkan sebagai Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional berdasarkan Peraturan Presiden Nomor 76 Tahun 2013 dan PermenPANRB Nomor 3 Tahun 2015.</p>

      <p>SPAN-LAPOR! dibentuk untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya. SPAN bertujuan untuk:</p>

      <ul class="list-disc pl-6 space-y-1">
        <li>Penyelenggara dapat mengelola pengaduan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik;</li>
        <li>Penyelenggara memberikan akses untuk partisipasi masyarakat dalam menyampaikan pengaduan; dan</li>
        <li>Meningkatkan kualitas pelayanan publik.</li>
      </ul>
    </div>
  </div>

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
