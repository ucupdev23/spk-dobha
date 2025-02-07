<?php
session_start();
require 'helper/koneksi.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : false;
$reset = isset($_SESSION['reset']) ? $_SESSION['reset'] : false;

if (!$email) {
    header("location: forgot.php");
    exit();
}

if (!$reset) {
    header("location: forgot.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    
    if ($password1 == $password2) {
        $password = md5($password1);

        // Check if the email exists in the database
        $checkEmailSql = "SELECT password FROM users WHERE email = :email";
        $checkEmailStmt = $conn->prepare($checkEmailSql);
        $checkEmailStmt->bindParam(':email', $email, PDO::PARAM_STR);
        $checkEmailStmt->execute();
        $existingPassword = $checkEmailStmt->fetchColumn();

        if ($existingPassword) {
            if ($existingPassword === $password) {
                $error = "Password baru tidak boleh sama dengan password lama.";
            } else {
                // Update password di tabel user
                $sql = "UPDATE users SET password = :password WHERE email = :email";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION['success'] = "Password berhasil diubah, silahkan login!!";
                    unset($_SESSION['reset']); // Clear reset session
                    header('Location: login.php');
                    exit();
                } else {
                    $error = "Mohon maaf. Password gagal diubah!";
                }
            }
        } else {
            $error = "Email tidak ditemukan.";
        }
    } else {
        $error = "Password tidak cocok. Mohon coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset Password &mdash; SPK</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    <style>
        body {
     background-image: url('assets/img/foto.png');
     background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100vh;
    margin: 0;
}
.card {
    background-color: rgba(255, 255, 255, 0.8); /* Putih dengan transparansi */
    border: none; /* Menghilangkan border */
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan */
}

        .password-toggle {
            position: relative;
            z-index: 1;
            left: 90%;
            top: -30px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <!-- <img src="assets/img/dobha.png" alt="logo"> -->
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Ubah Password</h4>
                            </div>

                            <div class="card-body">
                                <?php if (isset($_SESSION['forgot'])) : ?>
                                    <div class="alert alert-success"><?php echo $_SESSION['reset'];
                                                                        unset($_SESSION['reset']); ?></div>
                                <?php endif; ?>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST" class="needs-validation" novalidate="">

                                    <div class="form-group">
                                        <label for="password1">Password</label>
                                        <input id="password1" type="password" class="form-control" name="password1" tabindex="1" required autofocus>
                                         <span class="password-toggle" onclick="togglePassword1('password1')">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password2">Ulangi Password</label>
                                        <input id="password2" type="password" class="form-control" name="password2" tabindex="1" required>
                                        <span class="password-toggle" onclick="togglePassword2('password2')">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Please fill in your password again
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Ubah Password</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- <div class="simple-footer">
    Copyright &copy; Putri
</div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script>
        function togglePassword1(id) {
            var input = document.getElementById(id);
            var icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        function togglePassword2(id) {
            var input = document.getElementById(id);
            var icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
