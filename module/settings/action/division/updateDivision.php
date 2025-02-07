<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["division_id"])) {
    $division_id = $_POST['division_id'];
    $division_name = $_POST['division_name'];

    $query = "UPDATE divisions SET division_name = :division_name WHERE division_id = :division_id AND deleted ='no'";
    $statement = $conn->prepare($query);

    $statement->bindParam(':division_id', $division_id);
    $statement->bindParam(':division_name', $division_name);

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
