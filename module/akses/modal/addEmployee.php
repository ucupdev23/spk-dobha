<div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKaryawanModalLabel">Select Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addKaryawanForm">
                    <div class="form-group">
                        <label for="namaKaryawan">Nama Karyawan</label>
                        <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" required>
                        <input type="hidden" id="karyawanId" name="karyawanId">
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveKaryawanButton">Save changes</button>
            </div>
        </div>
    </div>
</div>