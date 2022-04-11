@extends('layouts.auth')

@section('subtitle')
Login
@endsection
@section('content')
<form method="POST" action="{{ route('login') }}" class="pt-3">
    @csrf
    <div class="form-group mb-2">
        <input type="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Username">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-2">
        <input type="password" class="form-control form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn">SIGN IN</button>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                Keep me signed in
            </label>
        </div>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
        @endif
    </div>
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
    </div>
</form>
@endsection
