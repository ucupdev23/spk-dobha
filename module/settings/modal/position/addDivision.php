<?php
include "module/$page/model/data.php";

$divisions = getDivision();
$divisi = getDivisions();
$today = date("Y-m-d");

?>
<div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPositionModalLabel">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPositionForm">
                    <div class="form-group">
                        <label for="namaPosisi">Nama Jabatan</label>
                        <input type="text" class="form-control" id="namaPosisi" name="namaPosisi" required>
                    </div>
                    <div class="form-group">
                        <label for="division_id">Pilih Divisi</label>
                        <select class="form-control" id="division_id" name="division_id" required>
                            <option value="">Pilih Divisi</option>
                            <?php foreach ($divisions as $division) : ?>
                                <option value="<?= $division->division_id ?>"><?= $division->division_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="savePositionButton">Save changes</button>
            </div>
        </div>
    </div>
</div>