<?php
include '../../../helper/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = $_POST['searchValue'];

$query = "SELECT * FROM users JOIN divisions ON divisions.division_id = users.division_id JOIN positions ON positions.position_id = users.position_id WHERE users.deleted = 'no' AND supervisor_id = 2";

if (!empty($searchValue)) {
    $query .= " AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )";
}

$query .= " ORDER BY users.id ASC LIMIT $start, $length";

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
        $division = $row['division_name'];
        $action = '<button class="btn btn-danger" onclick="deleteEmployee(' . $row['id'] . ')">
                                            <i class="fas fa-window-close"></i>
                                        </button>';

        $response['data'][] = array(
            'no' => $no,
            'name' => $name,
            'division' => $division,
            'position' => $position,
            'action' => $action

        );
        $no++;
    }

    $response['recordsTotal'] = $conn->query("SELECT COUNT(*) FROM users JOIN divisions ON divisions.division_id = users.division_id JOIN positions ON positions.position_id = users.position_id WHERE users.deleted = 'no' AND supervisor_id = 2")->fetchColumn();
    if (!empty($searchValue)) {
        $response['recordsFiltered'] = $conn->query("SELECT COUNT(*) FROM users WHERE deleted = 'no'AND supervisor_id = 2 AND ( users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.nip LIKE '%$searchValue%' )")->fetchColumn();
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
