<?php
$redirect_to = $_SERVER['HTTP_REFERER'];

session_start();
session_destroy();
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['nama']);

header("location: login.php");
