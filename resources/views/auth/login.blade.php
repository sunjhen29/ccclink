@extends('layouts.login.login')

@section('form')
    <div class="login-box">
        <div class="login-logo">
            <b>Employee</b> Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ url('/login') }}" method="POST" role="form">

                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div> <!-- /.login-box -->
@endsection

