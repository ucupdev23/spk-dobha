<?php
include "module/$page/model/data.php";

$divisions = getDivision();
$today = date("Y-m-d");

?>

<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEdit">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nip">Nomor Induk Karyawan</label>
                        <input type="number" class="form-control" id="edit_nip" name="edit_nip" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_name">Nama Karyawan</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email Karyawan</label>
                        <input type="email" class="form-control" id="edit_email" name="edit_email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_division_id">Divisi</label>
                        <select class="form-control" id="edit_division_id" name="edit_division_id" required>
                            <option value="" disabled selected>Select Divisi</option>
                            <?php foreach ($divisions as $division) : ?>
                                <option value="<?= $division->division_id ?>"><?= $division->division_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_position_id">Posisi</label>
                        <select class="form-control" id="edit_position_id" name="edit_position_id" required>
                            <option value="" disabled selected>Select Position</option>
                            <!-- Options will be loaded dynamically using JavaScript -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="updateEmployee" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>