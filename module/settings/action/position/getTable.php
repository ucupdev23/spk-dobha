<?php
include '../../../../helper/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['searchValue'];

$query = "SELECT * FROM positions JOIN divisions ON divisions.division_id = positions.division_id WHERE positions.deleted = 'no'";

if (!empty($searchValue)) {
    $query .= " AND ( positions.position_name LIKE '%$searchValue%' )";
}

$query .= " ORDER BY positions.position_name ASC LIMIT $start, $length";

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
        $division_name = $row['division_name'];
        $position_name = $row['position_name'];
        // $action = '<div class="dropdown no-arrow ml-2 mb-4 ml-auto text-center">
        // <i class="fas fa-edit text-primary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        // <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        //     <a class="dropdown-item" data-toggle="modal" data-target="#editposition" data-id="' . $row['position_id'] . '">Edit</a>
        //     <a class="dropdown-item delete-btn text-danger" onclick="deleteposition(' . $row['position_id'] . ')">Delete</a>
        // </div>';
        $action = '<div class="dropdown no-arrow ml-2 mb-4 ml-auto text-center">
        <i class="fas fa-edit text-primary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="modal" data-target="#editPosition" data-id="' . $row['position_id'] . '">Edit</a>
        </div>';

        $response['data'][] = array(
            'no' => $no,
            'division_name' => $division_name,
            'position_name' => $position_name,
            'action' => $action
        );
        $no++;
    }

    $response['recordsTotal'] = $conn->query("SELECT COUNT(*) FROM positions JOIN divisions ON divisions.division_id = positions.division_id WHERE positions.deleted = 'no'")->fetchColumn();
    if (!empty($searchValue)) {
        $response['recordsFiltered'] = $conn->query("SELECT COUNT(*) FROM positions WHERE deleted = 'no' AND ( position_name LIKE '%$searchValue%' )")->fetchColumn();
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
