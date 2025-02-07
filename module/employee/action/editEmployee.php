<?php

include '../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM users WHERE id = :id AND deleted = 'no'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $response = array(
            "success" => true,
            "id" => $result['id'],
            "name" => $result['name'],
            "email" => $result['email'],
            "nip" => $result['nip'],
            "division_id" => $result['division_id'],
            "position_id" => $result['position_id'] // Pastikan kolom ini ada di tabel
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Record not found.'
        );
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Record ID is missing.'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
