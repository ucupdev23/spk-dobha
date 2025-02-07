<?php
include '../../../helper/koneksi.php';

$employee_id = $_POST['employee_id'];

if (empty($employee_id)) {
    echo json_encode(['success' => false, 'message' => 'Harap pilih nama karyawan sebelum melanjutkan!']);

    exit;
}

try {
    $stmt_get = $conn->prepare("SELECT ck1, ck2, ck3, ck4, kk1, kk2, kk3, kk4, sk1, sk2, sk3, sk4 FROM weight_values WHERE employee_id = :employee_id");
    $stmt_get->bindParam(':employee_id', $employee_id);
    $stmt_get->execute();
    $values = $stmt_get->fetch(PDO::FETCH_ASSOC);

    if (!$values) {
        echo json_encode(['success' => false, 'message' => 'Harap isi nilai alternative karyawan terlebih dahulu!']);
        exit;
    }

    $cf1 = ($values['ck1'] + $values['ck2']) / 2;
    $sf1 = ($values['ck3'] + $values['ck4']) / 2;
    $nkc = (0.6 * $cf1) + (0.4 * $sf1);

    $cf2 = ($values['kk1'] + $values['kk2'] + $values['kk4']) / 3;
    $sf2 = $values['kk3'];
    $nk = (0.6 * $cf2) + (0.4 * $sf2);

    $cf3 = ($values['sk1'] + $values['sk3'] + $values['sk4']) / 3;
    $sf3 = $values['sk2'];
    $nsk = (0.6 * $cf3) + (0.4 * $sf3);

    $ha = (0.4 * $nkc) + (0.3 * $nk) + (0.3 * $nsk);

    $stmt_check = $conn->prepare("SELECT * FROM calculations WHERE employee_id = :employee_id");
    $stmt_check->bindParam(':employee_id', $employee_id);
    $stmt_check->execute();
    $row_count = $stmt_check->rowCount();

    if ($row_count > 0) {
        $stmt = $conn->prepare("UPDATE calculations SET cf1 = :cf1, sf1 = :sf1, nkc = :nkc, cf2 = :cf2, sf2 = :sf2, nk = :nk, cf3 = :cf3, sf3 = :sf3, nsk = :nsk, ha = :ha WHERE employee_id = :employee_id");
    } else {
        $stmt = $conn->prepare("INSERT INTO calculations (employee_id, cf1, sf1, nkc, cf2, sf2, nk, cf3, sf3, nsk, ha) VALUES (:employee_id, :cf1, :sf1, :nkc, :cf2, :sf2, :nk, :cf3, :sf3, :nsk, :ha)");
    }

    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->bindParam(':cf1', $cf1);
    $stmt->bindParam(':sf1', $sf1);
    $stmt->bindParam(':nkc', $nkc);
    $stmt->bindParam(':cf2', $cf2);
    $stmt->bindParam(':sf2', $sf2);
    $stmt->bindParam(':nk', $nk);
    $stmt->bindParam(':cf3', $cf3);
    $stmt->bindParam(':sf3', $sf3);
    $stmt->bindParam(':nsk', $nsk);
    $stmt->bindParam(':ha', $ha);

    $stmt->execute();

    $response = array(
        'success' => true,
        'message' => 'Data calculated and saved successfully.'
    );
} catch (PDOException $e) {
    $response = array(
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    );
}

header('Content-Type: application/json');
echo json_encode($response);

$conn = null;
