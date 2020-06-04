@extends('layouts.app')

@section('content')
    <center>
        <form form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login_box">
                <div class="login_header col-md-12">
                    <h3 class="login_header_text" >Welcome!</h3>
                </div>
                <div class="login_body col-md-12">
                    <p class="login_input_label">username</p>
                    <input type="email" class="login_input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="login_body col-md-12">
                    <p class="login_input_label">password</p>
                    <input type="password" class="login_input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="login_button">login</button>
            </div>
        </form>
    </center>
@endsection
