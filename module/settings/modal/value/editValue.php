<div class="modal fade" id="editValue" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                        <label for="edit_code">Code Alternatif</label>
                        <input type="text" class="form-control" id="edit_code" name="edit_code" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="edit_name">Name Alternatif</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category_id">Category Alternatif</label>
                        <input type="text" class="form-control" id="edit_category_id" name="edit_category_id" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="edit_value">Nilai Alternatif</label>
                        <select class="form-control" id="edit_value" name="edit_value" required>
                            <option value="">Select</option>
                            <option value="1">~ 1 ~</option>
                            <option value="2">~ 2 ~</option>
                            <option value="3">~ 3 ~</option>
                            <option value="4">~ 4 ~</option>
                            <option value="5">~ 5 ~</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_label">Label Alternatif</label>
                        <input type="text" class="form-control" id="edit_label" name="edit_label" readonly required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="updateValue" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>