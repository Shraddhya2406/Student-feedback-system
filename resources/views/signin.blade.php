@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="card">
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <span class="text-dark">{{ session('status') }}</span>
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/signin">
                        @csrf

                        <div class="form-group row">
                            <label for="user_type"
                                class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2 ">
                                    <i class="fa fa-users icon"></i>
                                    <select class="form-control @error('user_type') is-invalid @enderror"
                                        name="user_type" required>
                                        <option value='S'>Student</option>
                                        <option value='F'>Faculty</option>
                                        <option value='A'>Admin</option>
                                    </select>
                                </div>
                                @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2 ">
                                    <i class="fa fa-envelope icon"></i>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2 ">
                                    <i class="fa fa-key icon"></i>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if(session('msg'))
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <span class="text-danger">{{ session('msg') }}</span>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                                <a class="btn btn-link" href="/forgot_password">
                                    {{ __('Forgot Your Password?') }}
                                </a>


                                <a class="btn btn-link" href="/registration">
                                    {{ __('Not yet Registered?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection