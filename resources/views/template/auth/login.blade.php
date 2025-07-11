@extends('template.auth.header')

@section('title', 'Login')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-12">
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Let's Get Started</h2>
                        <p class="mb-0">Sign in to continue</p>
                    </div>
                    <div class="p-40">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="username" value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    <input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="mt-15 mb-0">Don't have an account? <a href="{{route('register')}}" class="text-warning ms-5">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
