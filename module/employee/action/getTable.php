<?php
include '../../../helper/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['searchValue'];

$query = "SELECT * FROM users JOIN divisions ON divisions.division_id = users.division_id JOIN positions ON positions.position_id = users.position_id WHERE users.deleted = 'no'";

if (!empty($searchValue)) {
    $query .= " AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )";
}

$query .= " ORDER BY users.name ASC LIMIT $start, $length";

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
        $position = $row['position_name'];
        $nip = $row['nip'];
        $division = $row['division_name'];
        $action = '<div class="dropdown no-arrow ml-2 mb-4 ml-auto text-center">
        <i class="fas fa-edit text-primary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="modal" data-target="#editEmployee" data-id="' . $row['id'] . '">Edit</a>
            <a class="dropdown-item delete-btn text-danger" onclick="deleteEmployee(' . $row['id'] . ')">Delete</a>
        </div>';

        $response['data'][] = array(
            'no' => $no,
            'name' => $name,
            'nip' => $nip,
            'division' => $division,
            'position' => $position,
            'action' => $action

        );
        $no++;
    }

    $response['recordsTotal'] = $conn->query("SELECT COUNT(*) FROM users JOIN divisions ON divisions.division_id = users.division_id JOIN positions ON positions.position_id = users.position_id WHERE users.deleted = 'no'")->fetchColumn();
    if (!empty($searchValue)) {
        $response['recordsFiltered'] = $conn->query("SELECT COUNT(*) FROM users WHERE deleted = 'no' AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )")->fetchColumn();
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
