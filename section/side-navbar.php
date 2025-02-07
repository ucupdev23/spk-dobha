<?php
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : false;
$home = ($page == false) ? "active" : "";
$employee = ($page == "employee") ? "active" : "";
$alternative = ($page == "alternative") ? "active" : "";
$value = ($page == "value") ? "active" : "";
$calculation = ($page == "calculation") ? "active" : "";
$final_result = ($page == "final_result") ? "active" : "";
$akses = ($page == "akses") ? "active" : "";
$settings = ($page == "settings") ? "active" : "";
$profile = ($page == "profile") ? "active" : "";

?>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">SPK DOBHA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">SPK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= $home; ?>"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <?php
            if ($supervisor_id == 0) {
                echo '<li class="menu-header">Main Menu</li>
            <li class="' . $employee . '"><a class="nav-link" href="?page=employee"><i class="fas fa-users"></i> <span>Karyawan</span></a></li>
            <li class="' . $alternative . '"><a class="nav-link" href="?page=alternative"><i class="fas fa-list-alt"></i> <span>Alternatif</span></a></li>
            <li class="' . $value . '"><a class="nav-link" href="?page=value"><i class="fas fa-balance-scale"></i> <span>Nilai Bobot</span></a></li>
            <li class="' . $calculation . '"><a class="nav-link" href="?page=calculation"><i class="fas fa-calculator"></i> <span>Perhitungan</span></a></li>
            <li class="' . $final_result . '"><a class="nav-link" href="?page=final_result"><i class="fas fa-chart-line"></i> <span>Hasil Akhir</span></a></li>
            <li class="' . $akses . '"><a class="nav-link" href="?page=akses"><i class="fas fa-user-shield"></i> <span>Hak Akses</span></a></li>  
            <li class="' . $profile . '"><a class="nav-link" href="?page=profile"><i class="fas fa-lock"></i> <span>Password</span></a></li>
            <li class="' . $settings . '"><a class="nav-link" href="?page=settings"><i class="fas fa-cogs"></i> <span>Settings</span></a></li>';
            } else if ($supervisor_id == 2) {
                echo '<li class="menu-header">Main Menu</li>
            <li class="' . $alternative . '"><a class="nav-link" href="?page=alternative"><i class="fas fa-list-alt"></i> <span>Alternatif</span></a></li>
            <li class="' . $value . '"><a class="nav-link" href="?page=value"><i class="fas fa-balance-scale"></i> <span>Nilai Bobot</span></a></li>
            <li class="' . $calculation . '"><a class="nav-link" href="?page=calculation"><i class="fas fa-calculator"></i> <span>Perhitungan</span></a></li>
            <li class="' . $final_result . '"><a class="nav-link" href="?page=final_result"><i class="fas fa-chart-line"></i> <span>Hasil Akhir</span></a></li>
            <li class="' . $profile . '"><a class="nav-link" href="?page=profile"><i class="fas fa-lock"></i> <span>Password</span></a></li>';
            }
            ?>
        </ul>
    </aside>
</div>