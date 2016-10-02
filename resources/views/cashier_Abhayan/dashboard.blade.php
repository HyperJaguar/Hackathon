<?php
/**
 * Created by PhpStorm.
 * User: abhay
 * Date: 10/02/2016
 * Time: 12:41 PM
 */ ?>

@extends('layouts.master')


@section('content')
<div class = "container">
    <div class="row">
        <div class="col-sm-3 col-md-6 col-lg-12" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
            <div class ="panel panel-default">
                New orders: {{$countNewOrders}}<br>


                @foreach($newOrders as $newOrders)
                        {{$newOrders->item_id}}<br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection