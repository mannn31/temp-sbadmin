@extends('admin.layout.app', ['title' => 'My Profile'])

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('admin') }}" class="btn btn-sm btn-secondary shadow-sm mr-2">Back</a>
            <a href="javascript:void()" data-id="{{ $user->id }}" id="editProfile"
                class="btn btn-sm mb-0 btn-warning">Update Profile</a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('assets/img/pp/' . $user->foto) }}" class="img-fluid rounded">
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h4 class="font-weight-bold border-bottom pb-2">{{ $user->name }}
                            </h4>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Username
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $user->username }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Email
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.profile.component.edit-modal')
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '#editProfile', function() {
                $.get("{{ route('edit-profile', auth()->user()->id) }}", function(data) {
                    $('#modal-edit').modal('show');
                    setTimeout(function() {
                        $('#name').focus();
                    }, 500);
                    $('.modal-title').html("Update My Profile");
                    $('#updateBtn').removeAttr('disabled');
                    $('#updateBtn').html("Save");
                    $('#edit_user_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_username').val(data.username);
                    $('#edit_email').val(data.email);
                    $('#edit_foto').val(data.foto);
                })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                var formData = new FormData($('#updateForm')[0]);
                $('#updateBtn').attr('disabled', 'disabled');
                $('#updateBtn').html('Saving ...');
                $.ajax({
                    data: formData,
                    url: "{{ route('update-profile', auth()->user()->id) }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#updateForm').trigger("reset");
                        $('#modal-edit').modal('hide');
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
