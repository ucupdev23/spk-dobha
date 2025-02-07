<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $division_id = $_POST['id'];

    $query = "SELECT * FROM divisions WHERE division_id = $division_id AND deleted = 'no'";
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {

        foreach ($result as $row) {
            $division_id = $row['division_id'];
            $division_name = $row['division_name'];
        }
        $response = array(
            "success" => true,
            "division_id" => $division_id,
            "division_name" => $division_name
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
