<?php
require_once 'koneksi.php';

$users = [
    ['alex', 'alex123', 'Alex Admin', 'alex@cepuin.com', 'admin'],
    ['jack', 'jack123', 'Jack Petugas', 'jack@cepuin.com', 'petugas']
];

foreach ($users as $user) {
    $username = $user[0];
    $password = password_hash($user[1], PASSWORD_DEFAULT); // hash password
    $nama = $user[2];
    $email = $user[3];
    $role = $user[4];
    $status = 'Aktif';

    if ($role === 'admin') {
        $cek = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $cek->bind_param("s", $username);
        $cek->execute();
        $hasil = $cek->get_result();

        if ($hasil->num_rows == 0) {
            $stmt = $conn->prepare("INSERT INTO admins (username, password, nama_lengkap, email, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $password, $nama, $email, $status);
            $stmt->execute();
        }
    } elseif ($role === 'petugas') {
        $cek = $conn->prepare("SELECT * FROM petugas WHERE username = ?");
        $cek->bind_param("s", $username);
        $cek->execute();
        $hasil = $cek->get_result();

        if ($hasil->num_rows == 0) {
            $stmt = $conn->prepare("INSERT INTO petugas (username, password, nama_lengkap, email, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $password, $nama, $email, $status);
            $stmt->execute();
        }
    }
}

echo "Admin & Petugas berhasil dibuat!";
?>
