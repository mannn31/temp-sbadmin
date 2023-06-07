<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-dialog-centered">
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
                <input type="hidden" name="data_id" id="edit_data_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm mr-2" name="name" id="edit_name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm mr-2" name="username"
                            id="edit_username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-sm mr-2" name="email" id="edit_email">
                    </div>
                    <div class="form-group">
                        <label for="role">Roles<span class="text-danger">*</span></label>
                        <select class="form-control" name="role" id="edit_role">
                            <option selected disabled>---Select Roles---</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
