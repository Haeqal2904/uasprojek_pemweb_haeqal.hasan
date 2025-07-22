<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'cepuin_db'; // ganti dengan nama database kamu
$port = 8111;      // penting: pakai port 8111 karena bukan default

$conn = new mysqli($host, $user, $pass, $db, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
