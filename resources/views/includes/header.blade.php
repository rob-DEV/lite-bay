<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
        <a href="{{ route('index')  }}" class="navbar-brand">LITE-BAY</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">

        <ul class="nav navbar-nav navbar-right">
           @if(\Illuminate\Support\Facades\Auth::check())
                {{-- The user is logged in --}}
                <li><a href="{{ route('lb-sell-page') }}">Sell</a></li>
                <li><a href="{{ route('lb-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('sign-out') }}">Sign Out</a></li>
            @else
                <li><a href="{{ route('sign-up-page') }}">Sign Up</a></li>
                <li><a href="{{ route('login') }}">Sign In</a></li>
            @endif
        </ul>
        <div class="col-sm-6 col-md-6">
            <form class="navbar-form" role="search">
                <div class="input-group" id="search-nav">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>