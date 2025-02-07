<div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKaryawanModalLabel">Add Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addKaryawanForm">
                    <div class="form-group">
                        <label for="nipKaryawan">Nomor Induk Karyawan</label>
                        <input type="number" class="form-control" id="nipKaryawan" name="nipKaryawan" required>
                    </div>
                    <div class="form-group">
                        <label for="namaKaryawan">Nama Karyawan</label>
                        <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" required>
                    </div>
                    <div class="form-group">
                        <label for="emailKaryawan">Email Karyawan</label>
                        <input type="email" class="form-control" id="emailKaryawan" name="emailKaryawan" required>
                    </div>
                    <div class="form-group">
                        <label for="divisiKaryawan">Divisi</label>
                        <select class="form-control" id="divisiKaryawan" name="divisiKaryawan" required>
                            <option value="">Pilih Divisi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="posisiKaryawan">Jabatan</label>
                        <select class="form-control" id="posisiKaryawan" name="posisiKaryawan" required>
                            <option value="">Pilih Jabatan</option>
                        </select>
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