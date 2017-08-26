@extends('layouts.master')

@section('title')
    Lite-bay | Home
@endsection

@section('content')

    <div class="jumbotron">
        <div id="main-banner" style="background-image: url( {{asset('img/main_banner.jpg')}} ); background-size: cover;
                padding-top: 40px;
                padding-bottom: 60px;
                width: 100%;
                ">
            <h1>LITE-BAY</h1>
            <p class="lead">Ebay for Litecoin</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>How buying works.</h2>
            <p>
                You see something you want. You send your Litecoin as payment and we hold your coins securely as collateral until your item arrives.
                Rest assured in knowing that your Litecoin will be automatically refunded to your account as we can proof you sent it should you item not arrive.
                Once paid for it is then the sellers responsibility to ensure the item reaches you and that they provide postage proof. Sellers are also rated
                to ensure they can be trusted. Full T&amp;Cs.
            </p>
            <p><a class="btn btn-default" href="">Learn more &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>How selling works.</h2>
            <p>
                Have something to sell? Then do it! Post your item on Lite-bay and wait for a payment in LTC to reach you.
                We hold you payment securely until delivery is confirmed, it is your responsibility to provide proof of postage.
                New sellers are limited to sell only 10 LTCs worth of goods until they build a positive reputation score.
            </p>
            <p><a class="btn btn-default" href="">Learn more &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Why Lite-bay</h2>
            <p>
                Lite-bay acts as a gateway between to entities in a way which helps both the buyer and seller gain trust in each other.
            </p>
            <p><a class="btn btn-default" href="">Learn more &raquo;</a></p>
        </div>
    </div>

@endsection
