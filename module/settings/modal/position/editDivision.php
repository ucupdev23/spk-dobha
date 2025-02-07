<div class="modal fade" id="editPosition" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="edit_position_id" name="id">
                    <div class="form-group">
                        <label for="edit_position_name">Nama Jabatan</label>
                        <input type="text" class="form-control" id="edit_position_name" name="edit_position_name" required>
                    </div>
                    <div class="form-group">
    <label for="edit_division_id">Pilih Divisi</label>
    <select class="form-control" id="edit_division_id" name="edit_division_id" required>
        <option value="">Select Divisi</option>
        <?php foreach ($divisi as $division) : ?>
            <option value="<?= $division->division_id ?>" <?= ($division->division_id == $selected_division_id) ? 'selected' : '' ?>>
                <?= $division->division_name ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="updatePosition" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>