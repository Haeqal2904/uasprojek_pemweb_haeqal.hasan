<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);

    if (empty($username) || empty($password) || empty($nama) || empty($email)) {
        echo "GAGAL: Semua field harus diisi.";
        exit;
    }

    // Cek apakah username sudah ada
    $cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cekResult = $cek->get_result();

    if ($cekResult->num_rows > 0) {
        echo "DUPLIKAT: Username sudah digunakan.";
        exit;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, email, role, status) VALUES (?, ?, ?, ?, 'masyarakat', 'Aktif')");
        $stmt->bind_param("ssss", $username, $hashedPassword, $nama, $email);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            echo "GAGAL: " . $stmt->error;
            exit;
        }
    }
}
