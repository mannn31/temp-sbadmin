@extends('auth.layout.app', ['title' => 'Register'])

@section('content')
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-lg-6 mt-4 pt-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="name"
                                                name="name" placeholder="Full Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">I agree to the
                                                        terms & conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <a class="small" href="{{ route('login') }}">Already have an account?
                                                    Login!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="login.html" class="btn btn-info btn-user btn-block">
                                        Register Account
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
