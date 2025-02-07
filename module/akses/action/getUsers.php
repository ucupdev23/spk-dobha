<?php
include '../../../helper/koneksi.php';
$search = $_POST['search'];

$query = "SELECT id, name, (SELECT division_name FROM divisions WHERE division_id = users.division_id) as division, (SELECT position_name FROM positions WHERE position_id = users.position_id) as position FROM users WHERE name LIKE :search AND deleted = 'no' AND supervisor_id != 0 AND supervisor_id != 2";
$stmt = $conn->prepare($query);
$searchTerm = "%" . $search . "%";
$stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
