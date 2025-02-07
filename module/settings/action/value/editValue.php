<?php

include '../../../../helper/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM alternatif_value JOIN categories ON categories.id = alternatif_value.category_id WHERE alternatif_value.id = $id AND alternatif_value.deleted = 'no'";
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {

        foreach ($result as $row) {
            $id = $row['id'];
            $code = $row['code'];
            $name = $row['name'];
            $category_id = $row['category_name'];
            $value = $row['value'];
            $label = $row['label'];
        }
        $response = array(
            "success" => true,
            "id" => $id,
            "code" => $code,
            "name" => $name,
            "category_id" => $category_id,
            "value" => $value,
            "label" => $label
        );
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Record ID is missing.'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
