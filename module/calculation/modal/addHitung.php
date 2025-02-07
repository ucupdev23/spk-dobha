<div class="modal fade" id="addHitungModal" tabindex="-1" role="dialog" aria-labelledby="addHitungModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHitungModalLabel">Pilih Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addHitungForm">
                    <div class="form-group">
                        <label for="namaKaryawan">Nama Karyawan</label>
                        <select class="form-control" id="namaKaryawan" name="namaKaryawan" required>
                            <option value="">Select Employee</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveHitungButton">Save changes</button>
            </div>
        </div>
    </div>
</div>