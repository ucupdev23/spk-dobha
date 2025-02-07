<?php
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
require 'helper/koneksi.php';

if ($user_id) {
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : false;
    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $detail = isset($_GET['detail']) ? $_GET['detail'] : false;
} else {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("section/head.php"); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php
            include_once("section/top-navbar.php");
            include_once("section/side-navbar.php");
            include_once("section/content.php");
            include_once("section/footer.php");
            ?>

        </div>
    </div>

    <?php include_once("section/script.php"); ?>

</body>

</html>