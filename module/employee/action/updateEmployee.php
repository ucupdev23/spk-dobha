<?php

include '../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nip = $_POST['nip'];
    $division_id = $_POST['division_id'];
    $position_id = $_POST['position_id'];

    $query = "UPDATE users SET name = :name, email = :email, nip = :nip, division_id = :division_id, position_id = :position_id WHERE id = :id AND deleted ='no'";
    $statement = $conn->prepare($query);

    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':nip', $nip);
    $statement->bindParam(':division_id', $division_id);
    $statement->bindParam(':position_id', $position_id);

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
