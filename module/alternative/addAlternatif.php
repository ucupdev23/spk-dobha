<?php
include "module/$page/model/data.php";

$employees = getEmployee();
$today = date("Y-m-d");

?>
<div class="section-header">
    <h1>Alternatif</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Main Menu</a></div>
        <div class="breadcrumb-item">Alternatif</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Input Atribut</h4>
                <a href="?page=alternative" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <div class="container form-container">
                    <form id="penilaianForm" action="addAlternatif.php" method="POST">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="employee_id" class="form-label">Select Employee</label>
                                    <select class="form-control" id="employee_id" name="employee_id" required>
                                        <option value="" disabled selected>Select</option>
                                        <?php foreach ($employees as $employee) : ?>
                                            <option value="<?= $employee->id ?>"><?= $employee->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <b><i class="text-start text-primary mb-4">Aspek Kecerdasan</i></b>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c1" class="form-label">Penguasaan Jobdesk (C1)</label>
                                    <select class="form-control" id="c1" name="c1" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c2" class="form-label">Penguasaan Product Knowledge (C2)</label>
                                    <select class="form-control" id="c2" name="c2" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c3" class="form-label">Kreatif (C3)</label>
                                    <select class="form-control" id="c3" name="c3" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c4" class="form-label">Inovatif (C4)</label>
                                    <select class="form-control" id="c4" name="c4" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <b><i class="text-start text-primary mb-4">Aspek Kinerja</i></b>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="k1" class="form-label">Teliti (K1)</label>
                                    <select class="form-control" id="k1" name="k1" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="k2" class="form-label">Disiplin (K2)</label>
                                    <select class="form-control" id="k2" name="k2" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="k3" class="form-label">Bertanggung Jawab (K3)</label>
                                    <select class="form-control" id="k3" name="k3" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="k4" class="form-label">Cepat dan Tepat (K4)</label>
                                    <select class="form-control" id="k4" name="k4" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <b><i class="text-start text-primary mb-4">Aspek Sikap Kerja</i></b>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="s1" class="form-label">Kejujuran (S1)</label>
                                    <select class="form-control" id="s1" name="s1" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="s2" class="form-label">Karakter (S2)</label>
                                    <select class="form-control" id="s2" name="s2" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="s3" class="form-label">Inisiatif (S3)</label>
                                    <select class="form-control" id="s3" name="s3" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="s4" class="form-label">Komunikasi (S4)</label>
                                    <select class="form-control" id="s4" name="s4" required>
                                        <option value="">Select</option>
                                        <option value="1">~ 1 ~ Sangat Kurang</option>
                                        <option value="2">~ 2 ~ Kurang</option>
                                        <option value="3">~ 3 ~ Cukup</option>
                                        <option value="4">~ 4 ~ Baik</option>
                                        <option value="5">~ 5 ~ Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="savePenilaianButton">Save</button>
                        </div>
                    </form>
                </div><br>
            </div>
        </div>
    </div>
</div>