@extends('layouts.master')

@section('title')
    Lite-bay | Dashboard
@endsection

@section('scripts')
    <script src="{{ asset('js/lite-bay.js') }}" defer="defer"></script>
@endsection

@section('content')

    <div class="jumbotron">
        <h1>LITE-BAY</h1>
        <p class="lead">Ebay for Litecoin</p>
        <p><a href="https://asp.net" class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
    </div>

    <div class="row">
        @include('includes.error-message-block')
        <ul class="nav nav-tabs" id="tabs">
            <li class="active"><a class="tab" href="#watch" data-toggle="tab" aria-expanded="true">Buying</a></li>
            <li class=""><a class="tab" href="#sell" data-toggle="tab" aria-expanded="false">Selling</a></li>
            <li class=""><a class="tab" href="#profile-tab" data-toggle="tab" aria-expanded="false">Profile</a></li>
        </ul>


        <div class="tab-content">

            {{-- Buying tab --}}
            <div class="tab-pane fade active in" id="watch">
                {{-- Unwatch selected items--}}
                <a href="#" class="btn btn-primary btn-xs">Unwatch</a>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Title</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Buy</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td><input type="checkbox"></td>
                        <td>
                            <div class="item_thumbnail">
                                <img src="{{ asset('img/stock_1.jpg') }}">
                            </div>

                        </td>
                        <td>BARGAIN JOBLOT LENOVO T410 / T420 INTEL CORE i5 LAPTOPS, 4GB RAM, NO HDD</td>
                        <td>11-Sep,19:05 BST</td>
                        <td>LTC-500</td>
                        <td><a href="#" class="btn btn-primary btn-sm">Buy</a></td>
                    </tr>

                    </tbody>
                </table>

                <br>
            </div>

            {{-- Selling tab --}}
            <div class="tab-pane fade" id="sell">
                <a href="#" class="btn btn-primary btn-xs">Unwatch</a>
                @if(count($items_selling) > 0)
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Title</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Buy</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($items_selling as $item)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <div class="item_thumbnail">
                                        <img src="{{ asset('img/stock_1.jpg') }}">
                                    </div>

                                </td>
                                <td>{{ $item->title }}</td>
                                <td>11-Sep,19:05 BST</td>
                                <td>LTC {{ $item->price }}</td>
                                <td><a href="#" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $items_selling->links() }}
                    </div>
                @else
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Info!</strong>
                        Oh... You aren't selling any items.
                    </div>
                @endif

            </div>


            {{-- Profile tab --}}
            <div class="tab-pane fade" id="profile-tab">

                <legend>Your LTC wallet</legend>

                {{-- If the wallet has been created show it and allow the user to view their public and private key --}}
                @if($wallet)
                    <div class="text-center">

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">  <img src="{{ asset('img/ltc_logo_sm.jpg') }}">  </div>
                            <div class="col-md-4"></div>
                        </div>

                        <h3>Available Balance : {{ $wallet->balance }}LTC</h3>
                        <h3>Held Balance : 0.00LTC</h3>

                        <a class="btn btn-success btn-sm" data-toggle="collapse" data-target="#priv-key-collapsible">Deposit</a>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#withdraw-modal">Withdraw</a>

                        {{-- withdraw modal --}}
                        <div class="modal fade" id="withdraw-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog centered-modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Add Litecoin to your Lite-bay wallet</h4>

                                    </div>
                                    <div class="modal-body">
                                        Deposit LTC using this public key:
                                        <div>
                                            <span id="ltc_pub_key">{{ $wallet->pub_key }}</span>
                                        </div>
                                        <button onclick="copyToClipboard('#ltc_pub_key')">Copy</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- view additional info --}}
                        <div id="priv-key-collapsible" class="collapse">
                            <h3>Public Key: {{ $wallet->pub_key }}</h3>
                            <h3>Your private key is stored securely.</h3>
                        </div>
                    </div>
                @else
                    <div id="no-ltc-wallet-holder">
                        <h3 class="text-center">You need a LTC wallet to buy and sell.</h3>
                        <form>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg btn-success" id="generate-wallet-push">Generate a Wallet</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script>
                        var token = '{{ Session::token() }}';
                        var gen_url = '{{ route('gen-ltc-wallet') }}';
                        var comp_url = '{{ route('lb-dashboard') }}';
                        var img = '{{ asset('img/ltc_logo_sm.jpg') }}';
                    </script>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <legend>Your Profile</legend>
                        <form class="form-group" action=" {{ route('update-user') }} " method="post">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label for="first_name">First Name:</label>
                                <span style="color:red">*</span>
                                <input class="form-control" name="first_name"type="text" value="{{ $user->first_name }}">
                            </div>
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label for="last_name">Last Name:</label>
                                <span style="color:red">*</span>
                                <input class="form-control" name="last_name"type="text" value="{{ $user->last_name }}">
                            </div>
                            <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                                <label for="user_name">User Name:</label>
                                <input class="form-control" name="user_name"type="text" value="{{ $user->user_name }}">
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Enter your password to confirm any changes</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Update your Information</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <legend>Change Password</legend>
                        <form class="form-group" action=" {{ route('update-password') }} " method="post">
                            <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
                                <label for="old_password">Enter your current password</label>
                                <input class="form-control" type="password" name="old_password">
                            </div>
                            <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                <label for="new_password">Enter a new password</label>
                                <input class="form-control" type="password" name="new_password">
                            </div>
                            <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                <label for="new_password_confirmation">Retype your new password</label>
                                <input class="form-control" type="password" name="new_password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>


            <script src="{{ asset('js/lite-bay-helper.js') }}" defer="defer"></script>
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


@endsection
