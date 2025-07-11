@extends('template.auth.app')

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

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                        <input type="email" class="form-control ps-15 bg-transparent" placeholder="Email"
                                            name="email" value="{{ old('email') }}" required autofocus
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
                                            placeholder="Password" name="password" required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <!-- Forgot Password -->
                                <div class="mb-3 text-end">
                                    @if (Route::has('password.request'))
                                        <a class="text-muted small" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger mt-10 w-100">SIGN IN</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p class="mt-15 mb-0">Don't have an account? <a href="{{ route('register') }}"
                                        class="text-warning ms-5">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
