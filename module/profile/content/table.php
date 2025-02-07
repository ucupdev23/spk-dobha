<?php
require 'helper/koneksi.php';


if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error = "Password baru dan konfirmasi password tidak cocok.";
    } else {
        try {
            // Check old password
            $stmt = $conn->prepare("SELECT password FROM users WHERE id = :id");
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Debugging statement
                $hashed_password = $user['password'];
                $old_password_md5 = md5($old_password);
                error_log("Password from DB: " . $hashed_password);
                error_log("Old password entered: " . $old_password);
                error_log("Old password MD5: " . $old_password_md5);

                if ($old_password_md5 !== $hashed_password) {
                    $error = "Password lama salah.";
                } else {
                    // Update new password
                    $new_hashed_password = md5($new_password);
                    $stmt = $conn->prepare("UPDATE users SET password = :password WHERE id = :id");
                    $stmt->bindParam(':password', $new_hashed_password, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        $success = "Password berhasil diubah.";
                    } else {
                        $error = "Terjadi kesalahan saat mengubah password.";
                    }
                }
            } else {
                $error = "User tidak ditemukan.";
            }
        } catch (PDOException $e) {
            $error = "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Ubah Password</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (isset($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <form id="changePasswordForm" method="POST">
                    <div class="form-group position-relative">
                        <label for="old_password">Password Lama</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" required>
                        <span class="password-toggle" onclick="togglePassword('old_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-group position-relative">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <span class="password-toggle" onclick="togglePassword('new_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-group position-relative">
                        <label for="confirm_password">Ulangi Password Baru</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <span class="password-toggle" onclick="togglePassword('confirm_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function togglePassword(id) {
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

    $(document).ready(function() {
        $('#changePasswordForm').on('submit', function(event) {
            var newPassword = $('#new_password').val();
            var confirmPassword = $('#confirm_password').val();

            // if (newPassword !== confirmPassword) {
            //     event.preventDefault();
            //     alert('Password baru dan konfirmasi password tidak cocok.');
            // }
        });
    });
</script>
