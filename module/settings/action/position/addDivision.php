<?php
include '../../../../helper/koneksi.php';

$namaPosisi = $_POST['namaPosisi'];
$division_id = $_POST['division_id'];

if (empty($namaPosisi) || empty($division_id)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO positions (division_id, position_name) VALUES (:division_id, :position_name)");
    $stmt->bindParam(':division_id', $division_id);
    $stmt->bindParam(':position_name', $namaPosisi);
    $stmt->execute();

    echo json_encode(['status' => 'success', 'message' => 'Position added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn = null;
