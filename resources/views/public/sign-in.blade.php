@extends('layouts.master')


@section('title')
    Sign In | Lite-bay
@endsection

@section('content')

    <div class="row">
        @include('includes.error-message-block')
        <div class="col-md-6 col-md-offset-3">
            <h3>Sign In</h3>
            <form action="{{ route('sign-in') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password"><a href="{{ route('request-password-change-page') }}">Forgotten your Password?</a></label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('sign-up-page') }}" class="btn btn-primary">Sign Up</a>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection