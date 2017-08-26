@extends('layouts.master')

@section('title')
    Lite-bay | Sell an Item
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

        <div class="col-lg-6">

            <form class=form-horizontal enctype="multipart/form-data" method="post">
                <fieldset>
                    <legend>Sell Your Item</legend>
                    <div class="form-group">
                        <label for="item_title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="item_title" placeholder="Title" id="item_title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_condition" class="col-lg-2 control-label">Condition</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="item_condition" id="item_condition">
                                <option>New</option>
                                <option>Used</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-lg-2 control-label">Photos</label>

                        <div class="jumbo-tron col-lg-10">
                            <input required type="file" class="form-control" name="item_images[]" multiple>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_price" class="col-lg-2 control-label">Price</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon">LTC</span>
                                <input type="text" class="form-control" name="item_price" id="item_price" placeholder="Price"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Details</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" name="item_details" id="item_details"></textarea>
                            <span class="help-block">Describe good/bad points of your item, a clear description makes people more likely to buy your item.</span>
                        </div>
                    </div>

                    <legend>Postage</legend>

                    <div class="form-group">
                        <label for="item_postage_service" class="col-lg-2 control-label">Postage</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="item_postage_service" id="item_postage_service">
                                <option>Royal Mail 1st Class</option>
                                <option>Royal Mail 2nd Class</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_postage_price" class="col-lg-2 control-label">Cost</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon">LTC</span>
                                <input type="text" class="form-control" name="item_postage_price" id="item_postage_price" placeholder="Price"/>
                            </div>
                        </div>
                    </div>

                </fieldset>


                <span class="help-block">Listing is free, we take a 0.5% cut when you item sells.</span>
                <button type="button" class="btn btn-primary" id="lb_list_button">List Your Item</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var list_item_url = '{{ route('list-item') }}';
        var comp_url = '{{ route('lb-dashboard') }}';
    </script>

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
