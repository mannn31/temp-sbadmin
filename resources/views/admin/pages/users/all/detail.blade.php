@extends('admin.layout.app', ['title' => 'Detail User'])

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail User - {{ $data->name }}</h1>
        <a href="{{ route('user-all') }}" class="btn btn-sm btn-secondary shadow-sm">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            {{-- <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="#" class="btn btn-sm btn-warning">Ubah Password</a>
            </div> --}}
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('assets/img/pp/' . $data->foto) }}" class="img-fluid rounded">
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h4 class="font-weight-bold border-bottom pb-2">{{ $data->name }}
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
                            {{ $data->username }}
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
                            {{ $data->email }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Created At
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $data->created_at }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Updated At
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $data->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
