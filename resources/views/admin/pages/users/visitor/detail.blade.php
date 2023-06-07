@extends('admin.layouts.app', ['title' => 'Detail GTK'])

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail GTK - {{ $civitas->name }}</h1>
        <a href="{{ route('gtk.index') }}" class="btn btn-sm btn-secondary shadow-sm">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            {{-- <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="#" class="btn btn-sm btn-warning">Ubah Password</a>
            </div> --}}
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('img/foto/' . $civitas->foto) }}" class="img-fluid rounded">
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h4 class="font-weight-bold border-bottom pb-2">{{ $civitas->name }}
                            </h4>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Status
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            @if ($civitas->civitas_detail->status === 'pns')
                                PNS
                            @elseif ($civitas->civitas_detail->status === 'nonpns')
                                Non PNS
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            NIP
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->nip }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            NUPTK
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->nuptk }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            NIK
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->nik }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Jenis Kelamin
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            @if ($civitas->civitas_detail->jk === 'l')
                                Laki-laki
                            @elseif ($civitas->civitas_detail->jk === 'p')
                                Perempuan
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Tempat, Tanggal Lahir
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->tempat_lahir }}, {{ $civitas->civitas_detail->tanggal_lahir }}
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
                            {{ $civitas->username }}
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
                            {{ $civitas->email }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Nomor Handphone
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->no_handphone }}
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            Alamat
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-7">
                            {{ $civitas->civitas_detail->alamat }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
