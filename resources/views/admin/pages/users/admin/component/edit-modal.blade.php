<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" name="updateForm" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="civitas_id" id="edit_civitas_id">
                <div class="modal-body">
                    <h5 class="font-weight-bold border-bottom pb-1">Data Pribadi</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="name"
                                    id="edit_name">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nip"
                                    id="edit_nip">
                            </div>
                            <div class="form-group">
                                <label for="nuptk">NUPTK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nuptk"
                                    id="edit_nuptk">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nik"
                                    id="edit_nik">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin<span class="text-danger">*</span></label>
                                <select name="jk" id="edit_jk" class="form-control">
                                    <option>---Pilih Jenis Kelamin---</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Jabatan<span class="text-danger">*</span></label>
                                <select class="form-control" name="role" id="edit_role">
                                    <option>---Pilih Jabatan---</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Kepala Sekolah</option>
                                    <option value="4">Petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Kepegawaian<span class="text-danger">*</span></label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option>---Pilih Status Kepegawaian---</option>
                                    <option value="pns">PNS</option>
                                    <option value="nonpns">Non PNS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="tempat_lahir"
                                    id="edit_tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm mr-2" name="tanggal_lahir"
                                    id="edit_tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label for="no_handphone">No Handphone<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="no_handphone"
                                    id="edit_no_handphone">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alamat" id="edit_alamat" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto"
                                            name="foto">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="font-weight-bold border-bottom pb-1">Data Akun</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username">Username GTK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="username"
                                    id="edit_username">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email GTK<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm mr-2" name="email"
                                    id="edit_email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
