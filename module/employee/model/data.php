<?php
include 'helper/koneksi.php';

function getDivision()
{
    global $conn;
    $query = $conn->query("SELECT * FROM divisions WHERE deleted = 'no'");
    return $query->fetchAll(PDO::FETCH_OBJ);
}
