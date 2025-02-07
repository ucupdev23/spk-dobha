<?php
include 'helper/koneksi.php';

function getAdmin()
{
    global $conn;
    $query = $conn->query("SELECT COUNT(*) FROM calculations");
    return $query->fetchAll(PDO::FETCH_OBJ);
}
function getEmployee()
{
    global $conn;
    $query = $conn->query("SELECT COUNT(*) FROM users WHERE deleted = 'no'");
    return $query->fetchAll(PDO::FETCH_OBJ);
}
function getFinals()
{
    global $conn;
    $query = $conn->query("SELECT users.name, calculations.ha FROM calculations JOIN users ON users.id = calculations.employee_id WHERE users.deleted = 'no' ORDER BY calculations.ha DESC LIMIT 4");
    return $query->fetchAll(PDO::FETCH_OBJ);
}
