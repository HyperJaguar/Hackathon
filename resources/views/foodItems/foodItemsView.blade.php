@extends('layouts.master')
@section('content')
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
          margin-bottom: 50px;
          border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
         .jumbotron {
          margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
          background-color: #f2f2f2;
          padding: 25px;
        }
      </style>
    <div class="jumbotron">
      <div class="container text-center">
        <h1>Canteen Food Items</h1>
      </div>
    </div>

    {{--<nav class="navbar navbar-inverse">--}}
      {{--<div class="container-fluid">--}}
        {{--<div class="navbar-header">--}}
          {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
          {{--</button>--}}
          {{--<a class="navbar-brand" href="#">Logo</a>--}}
        {{--</div>--}}
        {{--<div class="collapse navbar-collapse" id="myNavbar">--}}
          {{--<ul class="nav navbar-nav">--}}
            {{--<li class="active"><a href="#">Home</a></li>--}}
            {{--<li><a href="#">Products</a></li>--}}
            {{--<li><a href="#">Deals</a></li>--}}
            {{--<li><a href="#">Stores</a></li>--}}
            {{--<li><a href="#">Contact</a></li>--}}
          {{--</ul>--}}
          {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>--}}
            {{--<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>--}}
          {{--</ul>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</nav>--}}

    <div class="container">
      <div class="row">
         @foreach($items as $item)
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">{{$item->item_name}}</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Price: {{$item->unit_price}}</div>
          </div>
        </div>
        @endforeach

        <div class="col-sm-4">
          <div class="panel panel-danger">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-success">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
          </div>
        </div>
      </div>
    </div><br>

    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
          </div>
        </div>
      </div>
    </div><br><br>

    <footer class="container-fluid text-center">
      <p>SLIIT Canteen store Copyright</p>

    </footer>
@stop