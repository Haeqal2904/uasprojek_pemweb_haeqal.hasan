<?php
session_start();
require_once 'koneksi.php';

// Debug mode saat pengembangan
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi awal
    if (empty($username) || empty($password)) {
        echo "ERROR";
        exit;
    }

    // Fungsi bantu login sukses
    function loginSukses($user, $role) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $role;
        echo $role;
        exit;
    }

    // Fungsi bantu untuk mengecek di tabel
    function cekLogin($conn, $table, $username, $password, $roleName) {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data && password_verify($password, $data['password'])) {
            if ($data['status'] === 'Nonaktif') {
                echo "NONAKTIF";
                exit;
            } else {
                loginSukses($data, $roleName);
            }
        }
    }

    // Coba login sebagai admin
    cekLogin($conn, 'admins', $username, $password, 'admin');

    // Coba login sebagai petugas
    cekLogin($conn, 'petugas', $username, $password, 'petugas');

    // Coba login sebagai masyarakat
    cekLogin($conn, 'users', $username, $password, 'masyarakat');

    // Jika semua gagal
    echo "ERROR";
}
?>
