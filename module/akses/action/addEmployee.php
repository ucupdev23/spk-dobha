<?php
include '../../../helper/koneksi.php';
$id = $_POST['id'];
$supervisor_id = $_POST['supervisor_id'];
$password = md5('Admin1234');

$query = "UPDATE users SET supervisor_id = :supervisor_id, password = :password WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':supervisor_id', $supervisor_id, PDO::PARAM_INT);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo json_encode(array("status" => "success"));
} else {
    $errorInfo = $stmt->errorInfo();
    echo json_encode(array("status" => "error", "message" => $errorInfo[2]));
}
