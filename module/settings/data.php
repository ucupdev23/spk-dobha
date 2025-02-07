<?php
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : false;

if ($supervisor_id != 0) {
    include "module/401/data.php";
} else {
    
?>

<div class="section-header">
    <h1>Settings</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Main Menu</a></div>
        <div class="breadcrumb-item">Settings</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Konten header -->
                <?php include 'tabulasi/header.php'; ?>

                <!-- Content -->
                <?php include 'tabulasi/content.php'; ?>
            </div>
        </div>
    </div>
</div>
<!-- div tambahan -->
</div>
<?php
require "module/$page/modal/division/addDivision.php";
require "module/$page/modal/division/editDivision.php";
require "module/$page/modal/position/addDivision.php";
require "module/$page/modal/position/editDivision.php";
require "module/$page/modal/value/addValue.php";
require "module/$page/modal/value/editValue.php";
?>
<?php } ?>