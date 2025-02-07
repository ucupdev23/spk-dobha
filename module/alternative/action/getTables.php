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

// Start output buffering
ob_start();

$query = "SELECT * FROM gap_mappings JOIN users ON users.id = gap_mappings.employee_id WHERE users.deleted = 'no'";

if ($supervisor_id == 0) {
    $query .= " AND users.supervisor_id = 2";
} elseif ($supervisor_id == 2) {
    $query .= " AND users.division_id = :division_id AND users.supervisor_id != 2";
}

if (!empty($searchValue)) {
    $query .= " AND (users.name LIKE :search OR users.email LIKE :search OR users.nip LIKE :search)";
}

$query .= " ORDER BY gap_mappings.id ASC LIMIT :start, :length";

// Log query
file_put_contents('debug_log.txt', "Query: $query\n", FILE_APPEND);

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
    file_put_contents('debug_log.txt', "Query Error: " . print_r($errorInfo, true) . "\n", FILE_APPEND);
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Log result
file_put_contents('debug_log.txt', "Result: " . print_r($result, true) . "\n", FILE_APPEND);

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
        $c1 = $row['ch1'];
        $c2 = $row['ch2'];
        $c3 = $row['ch3'];
        $c4 = $row['ch4'];
        $k1 = $row['kh1'];
        $k2 = $row['kh2'];
        $k3 = $row['kh3'];
        $k4 = $row['kh4'];
        $s1 = $row['sh1'];
        $s2 = $row['sh2'];
        $s3 = $row['sh3'];
        $s4 = $row['sh4'];

        $response['data'][] = array(
            'no' => $no,
            'name' => $name,
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            's1' => $s1,
            's2' => $s2,
            's3' => $s3,
            's4' => $s4
        );
        $no++;
    }

    $recordsTotalQuery = "SELECT COUNT(*) FROM gap_mappings JOIN users ON users.id = gap_mappings.employee_id WHERE users.deleted = 'no'";
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
        file_put_contents('debug_log.txt', "RecordsTotal Query Error: " . print_r($errorInfo, true) . "\n", FILE_APPEND);
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
            file_put_contents('debug_log.txt', "RecordsFiltered Query Error: " . print_r($errorInfo, true) . "\n", FILE_APPEND);
        }

        $response['recordsFiltered'] = $recordsFilteredStmt->fetchColumn();
    } else {
        $response['recordsFiltered'] = $response['recordsTotal'];
    }
}

// Log response
file_put_contents('debug_log.txt', "Response: " . json_encode($response) . "\n", FILE_APPEND);

header('Content-Type: application/json');
echo json_encode($response);

// Check for JSON errors
if (json_last_error() !== JSON_ERROR_NONE) {
    // Log the error and the output for debugging
    file_put_contents('debug_log.txt', "JSON Error: " . json_last_error_msg() . "\n", FILE_APPEND);
    file_put_contents('debug_log.txt', "Response: " . json_encode($response) . "\n\n", FILE_APPEND);
}

$conn = null;
