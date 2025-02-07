<?php
$deploy = "yes";
if ($deploy == "no") {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'teh_putri';
    $base_url = "http://localhost/teh_putri";
} else {
    $host = 'localhost';
    $username = 'ucupco_putri';
    $password = '6#u&[ocpUNBB';
    $database = 'ucupco_putri';
    $base_url = "https://spkdobha.my.id";
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$hari_ini = date("Y-m-d");
date_default_timezone_set('Asia/Jakarta');
