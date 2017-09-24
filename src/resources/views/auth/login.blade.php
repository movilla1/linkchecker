@extends('layouts.app')

@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
                <div class="info d-flex align-items-center">
                <div class="content">
                    <div class="logo">
                    <h1>BackLink Checker</h1>
                    </div>
                    <p>Welcome to BackLink Checker</p>
                    <p>Please sign in to continue</p>
                </div>
                </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
                <div class="form d-flex align-items-center">
                <div class="content">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                <br>
                                <br>

                            @endif
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                <br>
                                <br>

                            @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input class="input-material" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            <label class="label-material" for="email" class="col-md-4 control-label">E-Mail Address</label>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input class="input-material" id="password" type="password" class="form-control" name="password" required>
                            <label class="label-material" for="password" class="col-md-4 control-label">Password</label>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
