<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $conn->query("UPDATE laporan SET selesai = 1 WHERE id = $id");
}

header("Location: dashboard-petugas.php");
exit;
?>
