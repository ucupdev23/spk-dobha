<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST['id'];
    $value = $_POST['value'];

    $query = "UPDATE alternatif_value SET value = :value WHERE id = :id AND deleted ='no'";
    $statement = $conn->prepare($query);

    $statement->bindParam(':id', $id);
    $statement->bindParam(':value', $value);

    $statement->execute();

    if ($statement->rowCount() > 0) {
        $response = array(
            'success' => true,
            'message' => 'Record updated successfully.'
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'An error occurred while updating the record.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn = null;
}
