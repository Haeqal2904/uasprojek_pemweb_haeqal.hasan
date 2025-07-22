<?php
require_once 'koneksi.php';

// Ambil admin
$admins = $conn->query("SELECT username, 'admin' as role, status FROM admins");
$pengguna = [];
while ($row = $admins->fetch_assoc()) {
    $pengguna[] = $row;
}

// Ambil petugas
$petugas = $conn->query("SELECT username, 'petugas' as role, status FROM petugas");
while ($row = $petugas->fetch_assoc()) {
    $pengguna[] = $row;
}

// Ambil masyarakat
$masyarakat = $conn->query("SELECT username, 'masyarakat' as role, status FROM users");
while ($row = $masyarakat->fetch_assoc()) {
    $pengguna[] = $row;
}

// Ambil laporan
$laporan = [];
$result = $conn->query("SELECT * FROM laporan ORDER BY tanggal DESC");
while ($row = $result->fetch_assoc()) {
    $laporan[] = $row;
}

echo json_encode([
    'pengguna' => $pengguna,
    'laporan' => $laporan
]);
