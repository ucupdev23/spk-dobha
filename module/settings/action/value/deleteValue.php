<?php

include '../../../../helper/koneksi.php';;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $query = "UPDATE alternatif_value SET deleted = 'yes' WHERE id = :id";
    $statement = $conn->prepare($query);

    $statement->bindParam(':id', $id);

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
