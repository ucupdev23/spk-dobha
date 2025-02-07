<?php
include '../../../helper/koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$division_id = isset($_SESSION['division_id']) ? $_SESSION['division_id'] : false;
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : false;

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

$query = "SELECT * FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no'";

if ($supervisor_id == 0) {
    $query .= " AND users.supervisor_id = 2";
} elseif ($supervisor_id == 2) {
    $query .= " AND users.division_id = :division_id AND users.supervisor_id != 2";
}

if (!empty($searchValue)) {
    $query .= " AND (users.name LIKE :search OR users.email LIKE :search OR users.nip LIKE :search)";
}

$query .= " ORDER BY calculations.ha DESC LIMIT :start, :length";

$stmt = $conn->prepare($query);

if ($supervisor_id == 2) {
    $stmt->bindParam(':division_id', $division_id, PDO::PARAM_INT);
}

if (!empty($searchValue)) {
    $search = "%$searchValue%";
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
}

$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':length', $length, PDO::PARAM_INT);

if (!$stmt->execute()) {
    $errorInfo = $stmt->errorInfo();
    echo json_encode(['error' => $errorInfo[2]]);
    exit;
}

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
        $nkc = $row['nkc'];
        $nk = $row['nk'];
        $nsk = $row['nsk'];
        $ha = $row['ha'];

        $response['data'][] = array(
            'no' => $no,
            'name' => $name,
            'nkc' => $nkc,
            'nk' => $nk,
            'nsk' => $nsk,
            'ha' => $ha
        );
        $no++;
    }

    $recordsTotalQuery = "SELECT COUNT(*) FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no'";
    if ($supervisor_id == 0) {
        $recordsTotalQuery .= " AND users.supervisor_id = 2";
    } elseif ($supervisor_id == 2) {
        $recordsTotalQuery .= " AND users.division_id = :division_id AND users.supervisor_id != 2";
    }
    $recordsTotalStmt = $conn->prepare($recordsTotalQuery);

    if ($supervisor_id == 2) {
        $recordsTotalStmt->bindParam(':division_id', $division_id, PDO::PARAM_INT);
    }

    if (!$recordsTotalStmt->execute()) {
        $errorInfo = $recordsTotalStmt->errorInfo();
        echo json_encode(['error' => $errorInfo[2]]);
        exit;
    }

    $response['recordsTotal'] = $recordsTotalStmt->fetchColumn();

    if (!empty($searchValue)) {
        $recordsFilteredQuery = $recordsTotalQuery . " AND (users.name LIKE :search OR users.email LIKE :search OR users.nip LIKE :search)";
        $recordsFilteredStmt = $conn->prepare($recordsFilteredQuery);

        if ($supervisor_id == 2) {
            $recordsFilteredStmt->bindParam(':division_id', $division_id, PDO::PARAM_INT);
        }

        $recordsFilteredStmt->bindParam(':search', $search, PDO::PARAM_STR);

        if (!$recordsFilteredStmt->execute()) {
            $errorInfo = $recordsFilteredStmt->errorInfo();
            echo json_encode(['error' => $errorInfo[2]]);
            exit;
        }

        $response['recordsFiltered'] = $recordsFilteredStmt->fetchColumn();
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
