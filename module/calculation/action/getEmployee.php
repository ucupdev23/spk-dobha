<?php
include '../../../helper/koneksi.php';
session_start();

$division_id = isset($_SESSION['division_id']) ? $_SESSION['division_id'] : false;
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : false;

header('Content-Type: application/json');

try {
    // Bangun kueri SQL berdasarkan kondisi
    $sql = "SELECT id, name FROM users WHERE deleted = 'no'";

    if ($supervisor_id == 0) {
        $sql .= " AND supervisor_id = 2";
    } elseif ($supervisor_id == 2) {
        $sql .= " AND division_id = :division_id AND supervisor_id != 2";
    }

    // Persiapkan kueri
    $stmt = $conn->prepare($sql);

    // Bind parameter jika diperlukan
    if ($supervisor_id == 2) {
        $stmt->bindParam(':division_id', $division_id, PDO::PARAM_INT);
    }

    // Eksekusi kueri
    $stmt->execute();
    $employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($employee);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn = null;
