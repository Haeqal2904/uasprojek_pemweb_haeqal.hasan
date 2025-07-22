<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
  echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan']);
  exit;
}

$id = intval($_GET['id']);

$query = "DELETE FROM laporan WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'message' => 'Gagal menghapus laporan']);
}
?>
