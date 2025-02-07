<?php
$supervisor_id = isset($_SESSION['supervisor_id']) ? $_SESSION['supervisor_id'] : false;

if ($supervisor_id != 0) {
    include "module/401/data.php";
} else {
    
?>

<div class="section-header">
    <h1>Karyawan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Main Menu</a></div>
        <div class="breadcrumb-item">Karyawan</a></div>
    </div>
</div>
<?php include 'content/table.php'; ?>
<!-- div tambahan -->
</div>
<?php
require "module/$page/modal/addEmployee.php";
require "module/$page/modal/editEmployee.php";
?>
<?php } ?>