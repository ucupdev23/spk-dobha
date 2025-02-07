<?php

include '../../../../helper/koneksi.php';;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $division_id = $_POST["id"];

    $query = "UPDATE divisions SET deleted = 'yes' WHERE division_id = :division_id";
    $statement = $conn->prepare($query);

    $statement->bindParam(':division_id', $division_id);

    $statement->execute();

    if ($statement->rowCount() > 0) {
        $response = array(
            'success' => true,
            'message' => 'Record deleted successfully.'
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Failed to delete the record.'
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
