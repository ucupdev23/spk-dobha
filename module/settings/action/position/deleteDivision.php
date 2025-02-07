<?php

include '../../../../helper/koneksi.php';;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $position_id = $_POST["id"];

    $query = "UPDATE positions SET deleted = 'yes' WHERE position_id = :position_id";
    $statement = $conn->prepare($query);

    $statement->bindParam(':position_id', $position_id);

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
