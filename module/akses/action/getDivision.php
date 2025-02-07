<?php
include '../../../helper/koneksi.php';

header('Content-Type: application/json');

try {
    $stmt = $conn->query("SELECT division_id, division_name FROM divisions WHERE deleted = 'no'");
    $divisions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($divisions);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn = null;
