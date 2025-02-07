<?php
session_start();
require 'helper/koneksi.php';

require 'assets/vendor/PHPMailer/src/PHPMailer.php';
require 'assets/vendor/PHPMailer/src/SMTP.php';
require 'assets/vendor/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = addslashes($_POST['email']);
    $email = htmlspecialchars($email);

    // Cek apakah email sudah terdaftar di tabel user
    $sql = "SELECT id, email FROM users WHERE email = :email AND supervisor_id != 1 AND deleted = 'no'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $user['id'];
        $emailUser = $user['email'];

        $nama_apk = 'SISTEM PENDUKUNG KEPUTUSAN';
        $_SESSION['email'] = $emailUser;

        // Nomor telepon terdaftar, generate OTP dan kirimkan via email
        $otp = mt_rand(123456, 999999);
        $waktu_saat_ini = date("Y-m-d H:i:s");

        // Masukkan atau perbarui data ke tabel log_login
        $queryLogin = "INSERT INTO log_login (user_id, email, otp) VALUES (:user_id, :email, :otp)";
        $queryLogLogin = $conn->prepare($queryLogin);
        $queryLogLogin->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $queryLogLogin->bindParam(':email', $email, PDO::PARAM_STR);
        $queryLogLogin->bindParam(':otp', $otp, PDO::PARAM_INT);

        if ($queryLogLogin->execute()) {
            $to = $emailUser;
            $subject = 'Kode Verifikasi OTP ' . $nama_apk;
            $headers = "From: no-reply@ucup.com\r\n";
            $headers .= "Reply-To: no-reply@ucup.com\r\n";
            $headers .= "Content-type: text/html\r\n";
            $email_otp = $otp;

            $message = "
            <html>
            <head>
                <title>Verifikasi OTP Reset Password</title>
            </head>
            <body>
                <h2>Berikut Kode OTP Reset Password pada Aplikasi $nama_apk Anda : $email_otp</h2>
            </body>
            </html>";

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'mail.ucup.com';                     // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'no-reply@ucup.com';                  // SMTP username
                $mail->Password   = 'L$!),!qbG([m';                         // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('no-reply@ucup.com', 'Forgot Password');
                $mail->addAddress($to);                                     // Add a recipient
                $mail->addReplyTo('no-reply@ucup.com', 'Information');

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                // echo 'Email sent successfully';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $_SESSION['forgot'] = "Kode OTP berhasil dikirim, silahkan cek email!";
            header('Location: validasi.php');
            exit();
        }
    } else {
        // email tidak terdaftar
        $error = "Mohon maaf, email tidak terdaftar!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot &mdash; SPK</title>

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
            background-color: rgba(255, 255, 255, 0.8);
            /* Putih dengan transparansi */
            border: none;
            /* Menghilangkan border */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            /* Menambahkan bayangan */
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
                                <h4>Forgot Password</h4>
                            </div>

                            <div class="card-body">
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST" class="needs-validation" novalidate="">

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Send OTP</button>
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