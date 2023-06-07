@extends('admin.layout.app', ['title' => 'Users - Visitor'])

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Users - Visitor</h1>
        <button id="createData" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
            Add User</button>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table align-items-center display responsive nowrap']) }}
            </div>
        </div>
    </div>
    @include('admin.pages.users.visitor.component.add-modal')
    @include('admin.pages.users.visitor.component.edit-modal')
@endsection


@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('library/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
    <script src="{{ asset('library/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {

            $('#createData').click(function() {
                setTimeout(function() {
                    $('#name').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Save");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Add Visitor");
                $('#modal-md').modal('show');
            });

            $('body').on('click', '#editItem', function() {
                var civitas_id = $(this).data('id');
                $.get("{{ route('user-visitor') }}" + '/' + civitas_id + '/edit', function(data) {
                    $('#modal-edit').modal('show');
                    setTimeout(function() {
                        $('#name').focus();
                    }, 500);
                    $('.modal-title').html("Ubah Profil GTK");
                    $('#updateBtn').removeAttr('disabled');
                    $('#updateBtn').html("Save");
                    $('#edit_civitas_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_username').val(data.username);
                    $('#edit_email').val(data.email);
                    $('#edit_nip').val(data.civitas_detail.nip);
                    $('#edit_nuptk').val(data.civitas_detail.nuptk);
                    $('#edit_nik').val(data.civitas_detail.nik);
                    $('#edit_jk').val(data.civitas_detail.jk);
                    $('#edit_tempat_lahir').val(data.civitas_detail.tempat_lahir);
                    $('#edit_tanggal_lahir').val(data.civitas_detail.tanggal_lahir);
                    $('#edit_no_handphone').val(data.civitas_detail.no_handphone);
                    $('#edit_status').val(data.civitas_detail.status);
                    $('#edit_alamat').val(data.civitas_detail.alamat);
                    $('#edit_foto').val(data.foto);
                    $('#edit_role').val(data.roles[0].id);
                })
            });

            $('body').on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                var confirmation = confirm("Apakah yakin untuk menghapus?");
                if (confirmation) {
                    var company_id = $(this).data('id');
                    var formData = new FormData($('#deleteDoc')[0]);
                    $('.deleteBtn').attr('disabled', 'disabled');
                    $('.deleteBtn').html('...');
                    $.ajax({
                        data: formData,
                        url: "{{ route('user-visitor') }}" + '/' + company_id,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: function(data) {
                            $('#deleteDoc').trigger("reset");
                            $('#visitor-table').DataTable().draw();
                            toastr.success(data.message);
                        },
                        error: function(data) {
                            $('.deleteBtn').removeAttr('disabled');
                            $('.deleteBtn').html('Hapus');
                            // toastr.error(data.responseJSON.message)
                            toastr.error('Tidak bisa hapus data karena sudah digunakan')
                        }
                    });
                }
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Saving ...');
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('user-visitor-store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#itemForm').trigger("reset");
                        $('#modal-md').modal('hide');
                        $('#visitor-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#saveBtn').removeAttr('disabled');
                        $('#saveBtn').html("Save");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                var company_id = $(this).data('id');
                var formData = new FormData($('#updateForm')[0]);
                $('#updateBtn').attr('disabled', 'disabled');
                $('#updateBtn').html('Saving ...');
                $.ajax({
                    data: formData,
                    url: "{{ route('user-visitor') }}" + '/' + company_id,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#updateForm').trigger("reset");
                        $('#modal-edit').modal('hide');
                        $('#visitor-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#updateBtn').removeAttr('disabled');
                        $('#updateBtn').html("Save");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });
        });
    </script>
@endpush
