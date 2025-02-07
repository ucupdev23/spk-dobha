<?php
include '../../../helper/koneksi.php';

header('Content-Type: application/json');

try {
    $division_id = isset($_GET['division_id']) ? $_GET['division_id'] : 0;

    $stmt = $conn->prepare("SELECT position_id, position_name FROM positions WHERE division_id = :division_id AND deleted = 'no'");
    $stmt->bindParam(':division_id', $division_id, PDO::PARAM_INT);
    $stmt->execute();
    $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($positions);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn = null;
