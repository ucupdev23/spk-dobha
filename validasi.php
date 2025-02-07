<?php
session_start();
require 'helper/koneksi.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : false;

if (!$email) {
    header("location: forgot.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp_entered = $_POST['otp'];
  
    // Cek apakah email sudah terdaftar di tabel log_login dan dapatkan OTP terbaru
    $sql = "SELECT otp FROM log_login WHERE email = :email ORDER BY updated_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stored_otp = $user['otp'];

        if ($otp_entered == $stored_otp) {
            $_SESSION['reset'] = "Kode OTP sesuai, silahkan ubah password!";
            header('Location: reset.php');
            exit();
        } else {
            // OTP tidak sesuai
            $error = "Kode OTP tidak valid. Mohon coba lagi!";
        }
    } else {
        // email tidak terdaftar
        $error = "Mohon maaf. Kode OTP tidak valid!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Verifikasi OTP &mdash; SPK</title>

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
                                <h4>Verifikasi OTP</h4>
                            </div>

                            <div class="card-body">
                                <?php if (isset($_SESSION['forgot'])) : ?>
                                    <div class="alert alert-success"><?php echo $_SESSION['forgot']; unset($_SESSION['forgot']); ?></div>
                                <?php endif; ?>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST" class="needs-validation" novalidate="">

                                    <div class="form-group">
                                        <label for="otp">OTP</label>
                                        <input id="otp" type="text" class="form-control" name="otp" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your otp
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Verifikasi OTP</button>
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
</body>

</html>
