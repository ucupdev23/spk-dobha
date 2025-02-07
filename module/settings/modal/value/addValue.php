<div class="modal fade" id="addValueModal" tabindex="-1" role="dialog" aria-labelledby="addValueModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addValueModalLabel">Tambah Alternatif Value</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addValueForm">
                    <div class="form-group">
                        <label for="code">Code Alternatif</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name Alternatif</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category Alternatif</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="value">Nilai Alternatif</label>
                        <select class="form-control" id="value" name="value" required>
                            <option value="">Select</option>
                            <option value="1">~ 1 ~</option>
                            <option value="2">~ 2 ~</option>
                            <option value="3">~ 3 ~</option>
                            <option value="4">~ 4 ~</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="label">Label Alternatif</label>
                        <select class="form-control" id="label" name="label" required>
                            <option value="">Select</option>
                            <option value="Core Factor">Core Factor</option>
                            <option value="Secondary Factor">Secondary Factor</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveValueButton">Save changes</button>
            </div>
        </div>
    </div>
</div>