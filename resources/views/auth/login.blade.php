@extends('layouts.master2')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/pages/authentication.css")}}">
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-title pt-1 ">
                                <h1 class="text-center fw-bold">Login</h1>
                            </div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="login-email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <p>you have acount <a href="{{route('register')}}">Register</a></p>
                                </div>

                                <button class="btn btn-primary w-100" type="submit" tabindex="4">Login</button>
                            </form>

                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset("app-assets/js/scripts/pages/auth-login.js")}}"></script>
@endsection