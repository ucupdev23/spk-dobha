<?php
include '../../../helper/koneksi.php';

$namaKaryawan = $_POST['namaKaryawan'];
$emailKaryawan = $_POST['emailKaryawan'];
$nipKaryawan = $_POST['nipKaryawan'];
$divisiKaryawan = $_POST['divisiKaryawan'];
$posisiKaryawan = $_POST['posisiKaryawan'];
$password = 'tidak ada password';
$supervisor_id = 1;

if (empty($namaKaryawan) || empty($emailKaryawan) || empty($nipKaryawan) || empty($divisiKaryawan) || empty($posisiKaryawan)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO users (name, nip, email, password, division_id, position_id, supervisor_id) VALUES (:name, :nip, :email, :password, :division_id, :position_id, :supervisor_id)");
    $stmt->bindParam(':name', $namaKaryawan);
    $stmt->bindParam(':nip', $nipKaryawan);
    $stmt->bindParam(':email', $emailKaryawan);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':division_id', $divisiKaryawan);
    $stmt->bindParam(':position_id', $posisiKaryawan);
    $stmt->bindParam(':supervisor_id', $supervisor_id);
    $stmt->execute();

    echo json_encode(['status' => 'success', 'message' => 'Employee added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn = null;
