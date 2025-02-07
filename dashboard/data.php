<?php
include "dashboard/model/data.php";

$users = getAdmin();
$employees = getEmployee();
$finals = getFinals();
$today = date("Y-m-d");

$totalAdmins = $users[0]->{'COUNT(*)'};
$totalEmployees = $employees[0]->{'COUNT(*)'};
?>

<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Perhitungan</h4>
                </div>
                <div class="card-body">
                    <?= $totalAdmins; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Karyawan</h4>
                </div>
                <div class="card-body">
                    <?= $totalEmployees; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Rangking</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#downloadModal">
                Download Data
            </button>
        </div>
        <div class="card-body">
            <?php include 'content/table.php'; ?>
        </div>
    </div>
</div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Rangking</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <?php foreach ($finals as $final) : ?>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-<?= array_search($final, $finals) + 1; ?>.png" alt="avatar">
                            <div class="media-body">
                                <div class="float-right text-primary"><?= $final->ha; ?></div>
                                <div class="media-title"><?= $final->name; ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- div tambahan -->
</div>
<!--Modal-->
<?php
require "dashboard/modal/downloadData.php";
?>