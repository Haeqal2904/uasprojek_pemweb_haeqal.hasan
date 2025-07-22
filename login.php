<?php
session_start();

// Kalau sudah login, langsung arahkan
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: dashboard-admin.php');
        exit;
    } elseif ($_SESSION['role'] === 'petugas') {
        header('Location: dashboard-petugas.php');
        exit;
    } else {
        header('Location: laporan.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - CEPUIN!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-orange-600">Login CEPUIN</h2>
    
    <form action="proses_login.php" method="POST" id="loginForm" class="space-y-4">
      <div>
        <label for="username" class="block text-sm font-medium">Username</label>
        <input type="text" name="username" id="username" required class="w-full px-3 py-2 border rounded">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium">Password</label>
        <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded">
      </div>
      <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white py-2 rounded transition">Login</button>
    </form>
    <p class="mt-4 text-center text-sm text-gray-600">
        Belum punya akun? <a href="register.php" class="text-orange-600 hover:underline">Daftar di sini</a>
    </p>

    <p id="responseMsg" class="mt-4 text-center text-sm text-red-500 hidden"></p>
  </div>

  <script>
    // AJAX optional (boleh dihilangkan kalau pakai submit biasa)
    const form = document.getElementById('loginForm');
    const responseMsg = document.getElementById('responseMsg');

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch('proses_login.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.text())
      .then(res => {
        if (res === 'admin') {
          window.location.href = 'dashboard-admin.php';
        } else if (res === 'petugas') {
          window.location.href = 'dashboard-petugas.php';
        } else if (res === 'masyarakat') {
          window.location.href = 'laporan.php';
        } else if (res === 'NONAKTIF') {
          responseMsg.textContent = 'Akun Anda dinonaktifkan.';
          responseMsg.classList.remove('hidden');
        } else {
          responseMsg.textContent = 'Username atau password salah.';
          responseMsg.classList.remove('hidden');
        }
      });
    });
  </script>

</body>
</html>
