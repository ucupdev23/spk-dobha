<?php
 session_start();
include_once("helper/koneksi.php");

if (isset($_POST['login'])) {
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    try {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND deleted = 'no'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['division_id'] = $row['division_id'];
            $_SESSION['supervisor_id'] = $row['supervisor_id'];
            header('location: index.php');
            return;
        } else {
                          $error = "Mohon maaf, email atau password yang kamu gunakan kurang tepat.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
