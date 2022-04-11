@extends('layouts.auth')

@section('subtitle')
Register
@endsection
@section('content')
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="pt-3">
    @csrf
    <div class="form-group mb-2">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputUsername1" placeholder="Username">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-2">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-2">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-2">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-2">
        <input type="file" class="form-control" name="avatar">
    </div>
    <div class="mb-4">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input">
                I agree to all Terms & Conditions
            </label>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn">SIGN UP</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
    </div>
</form>
@endsection
