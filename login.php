<?php
include_once("auth/login.php");
include_once("auth/head.php");
?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Login SPK</h4>
    </div>

    <div class="card-body">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION['success'];
                                                unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="" class="needs-validation" novalidate="">
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Please fill in your email
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                        <a href="forgot.php" class="text-small">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <span id="eye" onclick="change()"><i class="fa-solid fa-eye"></i></span>
                <div class="invalid-feedback">
                    please fill in your password
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>

    </div>
</div>
<?php include_once("auth/footer.php"); ?>