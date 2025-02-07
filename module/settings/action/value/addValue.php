<?php
include '../../../../helper/koneksi.php';

$code = $_POST['code'];
$name = $_POST['name'];
$value = $_POST['value'];
$category_id = $_POST['category_id'];
$label = $_POST['label'];

if (empty($code) || empty($category_id) || empty($value) || empty($name) || empty($label)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO alternatif_value (code, name, value, category_id, label) VALUES (:code, :name, :value, :category_id, :label)");
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':label', $label);
    $stmt->execute();

    echo json_encode(['status' => 'success', 'message' => 'Alternative Value added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn = null;
