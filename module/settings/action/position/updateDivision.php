<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["division_id"])) {
    $position_id = $_POST['position_id'];
    $division_id = $_POST['division_id'];
    $position_name = $_POST['position_name'];

    $query = "UPDATE positions SET position_name = :position_name,  division_id = :division_id WHERE position_id = :position_id AND deleted ='no'";
    $statement = $conn->prepare($query);

    $statement->bindParam(':position_id', $position_id);
    $statement->bindParam(':division_id', $division_id);
    $statement->bindParam(':position_name', $position_name);

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
