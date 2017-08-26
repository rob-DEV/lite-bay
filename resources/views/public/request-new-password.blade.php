@extends('layouts.master')


@section('title')
    New Password | Lite-bay
@endsection

@section('content')

    <div class="row">
        @include('includes.error-message-block')
        <div class="col-md-6 col-md-offset-3">
            <h3>Enter your email or user name</h3>
            <form action="{{ route('send-password-reset') }}" method="post">

                <div class="form-group {{ $errors->has('identifier') ? 'has-error' : '' }}">
                    <label for="identifier">Email</label>
                    <input class="form-control" type="text" name="identifier" id="identifier" value="{{ Request::old('identifier') }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection