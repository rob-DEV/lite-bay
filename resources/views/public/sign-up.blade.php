@extends('layouts.master')


@section('title')
    Sign Up | Lite-bay
@endsection

@section('content')

    <div class="row">
        @include('includes.error-message-block')
        <div class="col-md-6 col-md-offset-3">
            <h3>Sign Up</h3>
            <form action="{{ route('sign-up') }}" method="post">

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                    <label for="user_name">Username</label>
                    <input class="form-control" type="text" name="user_name" id="user_name" value="{{ Request::old('user_name') }}">
                </div>
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="terms_checkbox" type="checkbox"> I agree to the <a href="">terms and conditions</a> of Lite-bay.
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection