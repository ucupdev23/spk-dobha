<?php
include '../../../../helper/koneksi.php';

$namaDivisi = $_POST['namaDivisi'];

if (empty($namaDivisi)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO divisions (division_name) VALUES (:division_name)");
    $stmt->bindParam(':division_name', $namaDivisi);
    $stmt->execute();

    echo json_encode(['status' => 'success', 'message' => 'Divison added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn = null;
