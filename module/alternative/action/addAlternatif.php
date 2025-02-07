<?php
include '../../../helper/koneksi.php';

$employee_id = $_POST['employee_id'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$k1 = $_POST['k1'];
$k2 = $_POST['k2'];
$k3 = $_POST['k3'];
$k4 = $_POST['k4'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$s3 = $_POST['s3'];
$s4 = $_POST['s4'];

if (empty($employee_id) || empty($c1) || empty($c2) || empty($c3) || empty($c4) || empty($k1) || empty($k2) || empty($k3) || empty($k4) || empty($s1) || empty($s2) || empty($s3) || empty($s4)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $query = "SELECT code, value FROM alternatif_value WHERE code IN ('c1', 'c2', 'c3', 'c4', 'k1', 'k2', 'k3', 'k4', 's1', 's2', 's3', 's4')";
    $result = $conn->query($query);
    $values = $result->fetchAll(PDO::FETCH_KEY_PAIR);

    $ch1 = $c1 - $values['c1'];
    $ch2 = $c2 - $values['c2'];
    $ch3 = $c3 - $values['c3'];
    $ch4 = $c4 - $values['c4'];
    $kh1 = $k1 - $values['k1'];
    $kh2 = $k2 - $values['k2'];
    $kh3 = $k3 - $values['k3'];
    $kh4 = $k4 - $values['k4'];
    $sh1 = $s1 - $values['s1'];
    $sh2 = $s2 - $values['s2'];
    $sh3 = $s3 - $values['s3'];
    $sh4 = $s4 - $values['s4'];

    function calculateWeight($gap)
    {
        switch ($gap) {
            case 0:
                return 5;
            case 1:
                return 4.5;
            case -1:
                return 4;
            case 2:
                return 3.5;
            case -2:
                return 3;
            case 3:
                return 2.5;
            case -3:
                return 2;
            case 4:
                return 1.5;
            case -4:
                return 1;
            default:
                return 0;
        }
    }

    $ck1 = calculateWeight($ch1);
    $ck2 = calculateWeight($ch2);
    $ck3 = calculateWeight($ch3);
    $ck4 = calculateWeight($ch4);
    $kk1 = calculateWeight($kh1);
    $kk2 = calculateWeight($kh2);
    $kk3 = calculateWeight($kh3);
    $kk4 = calculateWeight($kh4);
    $sk1 = calculateWeight($sh1);
    $sk2 = calculateWeight($sh2);
    $sk3 = calculateWeight($sh3);
    $sk4 = calculateWeight($sh4);

    $stmt_check = $conn->prepare("SELECT * FROM mappings WHERE employee_id = :employee_id");
    $stmt_check->bindParam(':employee_id', $employee_id);
    $stmt_check->execute();
    $row_count = $stmt_check->rowCount();

    if ($row_count > 0) {
        $stmt = $conn->prepare("UPDATE mappings SET c1 = :c1, c2 = :c2, c3 = :c3, c4 = :c4, k1 = :k1, k2 = :k2, k3 = :k3, k4 = :k4, s1 = :s1, s2 = :s2, s3 = :s3, s4 = :s4 WHERE employee_id = :employee_id");
    } else {
        $stmt = $conn->prepare("INSERT INTO mappings (employee_id, c1, c2, c3, c4, k1, k2, k3, k4, s1, s2, s3, s4) VALUES (:employee_id, :c1, :c2, :c3, :c4, :k1, :k2, :k3, :k4, :s1, :s2, :s3, :s4)");
    }

    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->bindParam(':c1', $c1);
    $stmt->bindParam(':c2', $c2);
    $stmt->bindParam(':c3', $c3);
    $stmt->bindParam(':c4', $c4);
    $stmt->bindParam(':k1', $k1);
    $stmt->bindParam(':k2', $k2);
    $stmt->bindParam(':k3', $k3);
    $stmt->bindParam(':k4', $k4);
    $stmt->bindParam(':s1', $s1);
    $stmt->bindParam(':s2', $s2);
    $stmt->bindParam(':s3', $s3);
    $stmt->bindParam(':s4', $s4);

    $stmt->execute();

    $stmt_check_gap = $conn->prepare("SELECT * FROM gap_mappings WHERE employee_id = :employee_id");
    $stmt_check_gap->bindParam(':employee_id', $employee_id);
    $stmt_check_gap->execute();
    $row_count_gap = $stmt_check_gap->rowCount();

    if ($row_count_gap > 0) {
        $stmt_gap = $conn->prepare("UPDATE gap_mappings SET ch1 = :ch1, ch2 = :ch2, ch3 = :ch3, ch4 = :ch4, kh1 = :kh1, kh2 = :kh2, kh3 = :kh3, kh4 = :kh4, sh1 = :sh1, sh2 = :sh2, sh3 = :sh3, sh4 = :sh4 WHERE employee_id = :employee_id");
    } else {
        $stmt_gap = $conn->prepare("INSERT INTO gap_mappings (employee_id, ch1, ch2, ch3, ch4, kh1, kh2, kh3, kh4, sh1, sh2, sh3, sh4) VALUES (:employee_id, :ch1, :ch2, :ch3, :ch4, :kh1, :kh2, :kh3, :kh4, :sh1, :sh2, :sh3, :sh4)");
    }

    $stmt_gap->bindParam(':employee_id', $employee_id);
    $stmt_gap->bindParam(':ch1', $ch1);
    $stmt_gap->bindParam(':ch2', $ch2);
    $stmt_gap->bindParam(':ch3', $ch3);
    $stmt_gap->bindParam(':ch4', $ch4);
    $stmt_gap->bindParam(':kh1', $kh1);
    $stmt_gap->bindParam(':kh2', $kh2);
    $stmt_gap->bindParam(':kh3', $kh3);
    $stmt_gap->bindParam(':kh4', $kh4);
    $stmt_gap->bindParam(':sh1', $sh1);
    $stmt_gap->bindParam(':sh2', $sh2);
    $stmt_gap->bindParam(':sh3', $sh3);
    $stmt_gap->bindParam(':sh4', $sh4);

    $stmt_gap->execute();

    $stmt_check_weight = $conn->prepare("SELECT * FROM weight_values WHERE employee_id = :employee_id");
    $stmt_check_weight->bindParam(':employee_id', $employee_id);
    $stmt_check_weight->execute();
    $row_count_weight = $stmt_check_weight->rowCount();

    if ($row_count_weight > 0) {
        $stmt_weight = $conn->prepare("UPDATE weight_values SET ck1 = :ck1, ck2 = :ck2, ck3 = :ck3, ck4 = :ck4, kk1 = :kk1, kk2 = :kk2, kk3 = :kk3, kk4 = :kk4, sk1 = :sk1, sk2 = :sk2, sk3 = :sk3, sk4 = :sk4 WHERE employee_id = :employee_id");
    } else {
        $stmt_weight = $conn->prepare("INSERT INTO weight_values (employee_id, ck1, ck2, ck3, ck4, kk1, kk2, kk3, kk4, sk1, sk2, sk3, sk4) VALUES (:employee_id, :ck1, :ck2, :ck3, :ck4, :kk1, :kk2, :kk3, :kk4, :sk1, :sk2, :sk3, :sk4)");
    }

    $stmt_weight->bindParam(':employee_id', $employee_id);
    $stmt_weight->bindParam(':ck1', $ck1);
    $stmt_weight->bindParam(':ck2', $ck2);
    $stmt_weight->bindParam(':ck3', $ck3);
    $stmt_weight->bindParam(':ck4', $ck4);
    $stmt_weight->bindParam(':kk1', $kk1);
    $stmt_weight->bindParam(':kk2', $kk2);
    $stmt_weight->bindParam(':kk3', $kk3);
    $stmt_weight->bindParam(':kk4', $kk4);
    $stmt_weight->bindParam(':sk1', $sk1);
    $stmt_weight->bindParam(':sk2', $sk2);
    $stmt_weight->bindParam(':sk3', $sk3);
    $stmt_weight->bindParam(':sk4', $sk4);

    $stmt_weight->execute();

    $response = array(
        'success' => true,
        'message' => 'Data saved successfully.'
    );
} catch (PDOException $e) {
    $response = array(
        'success' => false,
        'message' => 'Terjadi kesalahan saat mendaftar: ' . $e->getMessage()
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn = null;
