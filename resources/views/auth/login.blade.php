@extends('layouts.app')
@section('content')
<div class="container-login100" style="background-image: url('{{asset('auth/images/bg-01.jpg')}}');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
            <span class="login100-form-title p-b-37">
                Sign In
            </span>

            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                <input class="input100 form-control @error('name') is-invalid @enderror"  type="text" name="name" placeholder="name">
                {{-- <span class="focus-input100"></span> --}}
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                <input  class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="password">
                {{-- <span class="focus-input100"></span> --}}
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>



            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign In
                </button>
            </div>

            <div class="text-center">
                <a href="/register" class="txt2 hov1">
                    Sign Up
                </a>
            </div>
        </form>

        
    </div>
</div>
    
@endsection