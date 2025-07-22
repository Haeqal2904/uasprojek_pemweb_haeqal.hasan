<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun - CEPUIN!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow w-full max-w-md">
    <h2 class="text-xl font-bold mb-4 text-center text-orange-600">Daftar Akun Baru</h2>
    
    <form method="POST" action="register_process.php" id="registerForm" class="space-y-4">
      <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded">
      <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded">
      <input type="text" name="nama" placeholder="Nama Lengkap" required class="w-full p-2 border rounded">
      <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded">
      <button type="submit" class="w-full bg-orange-600 text-white p-2 rounded hover:bg-orange-700">Daftar</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Sudah punya akun? <a href="login.php" class="text-orange-600 hover:underline">Login di sini</a>
    </p>
  </div>
</body>
</html>
