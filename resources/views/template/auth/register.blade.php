@extends('template.auth.header')

@section('title', 'Register')

@section('content')
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-12">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Get started with Us</h2>
                            <p class="mb-0">Register a new membership</p>
                        </div>
                        <div class="p-40">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                        <input type="text" class="form-control ps-15 bg-transparent" placeholder="Name"
                                            name="name" id="name" value="{{ old('name') }}" required autofocus
                                            autocomplete="name">
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                        <input type="email" class="form-control ps-15 bg-transparent" id="email"
                                            name="email" placeholder="Email Address" value="{{ old('email') }}" required
                                            autocomplete="username">
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                        <input type="password" class="form-control ps-15 bg-transparent"
                                            placeholder="Password" id="password" name="password" required
                                            autocomplete="new-password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                        <input type="password" class="form-control ps-15 bg-transparent"
                                            placeholder="Retype Password" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info mt-3">REGISTER</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0">Already have an account?<a href="{{ route('login') }}"
                                        class="text-danger ms-5"> Sign In</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
