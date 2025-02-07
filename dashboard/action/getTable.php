<?php
include '../../helper/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['searchValue'];

$query = "SELECT * FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no'";

if (!empty($searchValue)) {
    $query .= " AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )";
}

$query .= " ORDER BY calculations.ha DESC LIMIT $start, $length";

$stmt = $conn->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = array(
    'draw' => $draw,
    'recordsTotal' => 0,
    'recordsFiltered' => 0,
    'data' => array()
);

if (count($result) > 0) {
    $no = $start + 1;
    foreach ($result as $row) {
        $name = $row['name'];
        $ha = $row['ha'];

        $response['data'][] = array(
            'no' => $no,
            'name' => $name,
            'ha' => $ha
        );
        $no++;
    }

    $response['recordsTotal'] = $conn->query("SELECT COUNT(*) FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no'")->fetchColumn();
    if (!empty($searchValue)) {
        $response['recordsFiltered'] = $conn->query("SELECT COUNT(*) FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no' AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )")->fetchColumn();
    } else {
        $response['recordsFiltered'] = $response['recordsTotal'];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_last_error_msg();
}
$conn = null;
