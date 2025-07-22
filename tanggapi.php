<?php
require 'koneksi.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
$tanggapan = $data['tanggapan'] ?? '';

if ($id && $tanggapan !== '') {
  $stmt = $conn->prepare("UPDATE laporan SET tanggapan = ? WHERE id = ?");
  $stmt->bind_param("si", $tanggapan, $id);
  $stmt->execute();

  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}
