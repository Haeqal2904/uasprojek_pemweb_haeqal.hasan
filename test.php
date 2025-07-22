<?php
require_once 'koneksi.php';

$username = 'jack';
$passwordBaru = 'jack123';
$hashBaru = password_hash($passwordBaru, PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE petugas SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashBaru, $username);

if ($stmt->execute()) {
    echo "Password petugas berhasil diperbarui.";
} else {
    echo "Gagal update password.";
}
?>
