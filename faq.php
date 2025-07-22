<?php
session_start();
if (!isset($_SESSION['role'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FAQ - CEPUIN!</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to right, #ff8c42, #ff3c38);
    }

    .fade-in {
      opacity: 0;
      transform: translateY(10px);
      animation: fadeInUp 0.8s ease-out forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .faq-content {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.4s ease;
    }

    .faq-content.show {
      padding-top: 8px;
      padding-bottom: 8px;
      max-height: 300px;
    }
  </style>
</head>
<body class="text-white">

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

<!-- FAQ Section -->
<main class="max-w-3xl mx-auto bg-white text-black mt-10 p-6 rounded-xl shadow-lg fade-in">
  <h2 class="text-2xl font-bold mb-6 text-center text-orange-600">Pertanyaan yang Sering Diajukan (FAQ)</h2>

  <div class="space-y-4" id="faqContainer">
    <?php
    $faqs = [
      ["Apa itu aplikasi sistem pelaporan CEPUIN?", "CEPUIN adalah aplikasi berbasis web dan mobile yang memungkinkan masyarakat menyampaikan aduan, laporan, atau masukan terkait layanan publik kepada instansi terkait."],
      ["Bagaimana cara menyampaikan laporan?", "Anda dapat membuat laporan dengan mendaftar terlebih dahulu, lalu mengisi formulir laporan dengan informasi seperti kategori, lokasi kejadian, deskripsi, dan lampiran jika ada."],
      ["Apakah laporan saya dapat dibuat anonim?", "Ya, Anda dapat memilih opsi \"Laporan Anonim\" saat membuat laporan jika tidak ingin identitas Anda diketahui pihak lain."],
      ["Apa yang dimaksud dengan laporan rahasia?", "Laporan rahasia hanya dapat dilihat oleh admin atau pihak berwenang di instansi yang dituju, dan tidak akan dipublikasikan secara umum."],
      ["Berapa lama waktu penanganan laporan?", "Waktu penanganan tergantung pada jenis laporan dan instansi yang dituju, namun akan diproses sesuai SOP yang berlaku."],
      ["Bagaimana cara memantau status laporan?", "Anda bisa melihat status laporan dengan login, lalu membuka menu \"Laporan Saya\" untuk melihat daftar dan status laporan Anda."],
      ["Apakah saya bisa mengunggah lampiran atau bukti?", "Ya, Anda dapat mengunggah file seperti foto atau dokumen sebagai bukti pendukung dalam laporan."],
    ];

    foreach ($faqs as $faq) {
      echo '
      <div class="border rounded-lg">
        <button class="w-full text-left px-4 py-3 font-semibold bg-gray-100 hover:bg-gray-200 transition" onclick="toggleFAQ(this)">
          ' . htmlspecialchars($faq[0]) . '
        </button>
        <div class="faq-content px-4 text-sm bg-white text-gray-700">' . htmlspecialchars($faq[1]) . '</div>
      </div>';
    }
    ?>
  </div>
</main>

<!-- Footer -->
<footer class="bg-white text-gray-700 text-sm border-t pt-6 pb-4 mt-12 fade-in">
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

<script>
  function toggleFAQ(button) {
    const content = button.nextElementSibling;
    content.classList.toggle('show');
  }

  // Fade-in animasi saat load
  window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.fade-in').forEach(el => {
      el.style.animationDelay = '0.2s';
    });
  });
</script>

</body>
</html>
