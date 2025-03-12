@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="container-fluid mt-5 auth-container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title my-4 text-center">Create Account</h4>
                        <form novalidate class="row g-3" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="col-12">
                                <div class="input-group has-validation">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    <input type="text" placeholder="Full name" name="name" value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group has-validation">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    <input type="email" placeholder="Email address" name="email"
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group has-validation">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" placeholder="Create password" name="password"
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group has-validation">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" placeholder="Repeat password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </div>
                            <p class="text-center">Already have an account? <a href="{{ route('login') }}">Log In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

