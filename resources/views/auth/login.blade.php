@extends('auth.layout.app', ['title' => 'Login'])

@section('content')
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-lg-4 mt-4 pt-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="user" action="{{ route('loginProcess') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username"
                                            name="username" value="{{ old('username') }}" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address or Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <a class="small" href="{{ route('register') }}">Create an
                                                    Account!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
