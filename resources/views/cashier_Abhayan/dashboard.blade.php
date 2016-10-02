<?php
/**
 * Created by PhpStorm.
 * User: abhay
 * Date: 10/02/2016
 * Time: 12:41 PM
 */ ?>

@extends('layouts.master')


@section('content')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="SLIIT CANTEEN" src="...">
      </a>
    </div>
  </div>
</nav>


<div class = "container">


@if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('flash_message')}}
        </div>
@endif

    <div class="row">
        <div class="col-sm-3 col-md-6 col-lg-9" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">


            <div class ="panel panel-default">
                <div class="panel-heading">New Orders <span class="badge">{{$countNewOrders}}</div>
            <form action ="{{ URL::route('post-dashboard-confirm') }}" method="post">
                <table class="table table-hover">
                    @foreach($newOrders as $newOrders)
                    <tr>
                    <td>
                        User Name: {{$newOrders->name}}<br>
                    </td>
                    <td>
                            {{$newOrders->item_name}}<br>
                    </td>
                    <td>
                    <input type="hidden" class="btn btn-default" name="hiddenOrderID" value="{{$newOrders->order_id}}">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-default" name="buttonProcessItem" value="Process">
                    </td>
                    <td>
                           <input type="submit" class="btn btn-success" name="buttonConfirmItem" value="Confirm">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-danger" name="buttonCancelItem" value="Cancel">
                    </td>

                   </tr>
                    @endforeach
                 </table>


                {!! Form::token() !!}

             </form>
            </div>
        </div>
          {{--<div class="col-sm-3 col-md-6 col-lg-3" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">--}}
                    {{--<div class ="panel panel-default">--}}
                    {{--<div class="panel-heading"> In-progress: <span class="badge">{{$countInProgress}}</span></div>--}}

                         {{--<table class="table table-hover">--}}
                         {{--<tr>--}}
                         {{--<td>--}}
                        {{--<form action ="{{ URL::route('post-dashboard-confirm') }}" method="post">--}}
                            {{--@foreach($inProgressOrders as $inProgressOrders)--}}
                                {{--{{$inProgressOrders->name}}<br>--}}
                            {{--@endforeach--}}

                        {{--</td>--}}
                        {{--<td>--}}
                        {{--<input type="hidden" class="btn btn-default" name="hiddenOrderID" value="{{$newOrders->order_id}}">--}}
                            {{--<input type="submit" class="btn btn-success" name="buttonConfirmItem" value="Confirm">--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--{!! Form::token() !!}--}}

                                                {{--</form>--}}
                        {{--</table>--}}



                    {{--</div>--}}
            {{--</div>--}}
    </div>
</div>
@endsection