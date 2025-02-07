<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $position_id = $_POST['id'];

    $query = "SELECT * FROM positions WHERE position_id = :position_id AND deleted = 'no'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':position_id', $position_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $response = array(
            "success" => true,
            "position_id" => $result['position_id'],
            "division_id" => $result['division_id'],
            "position_name" => $result['position_name']
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
