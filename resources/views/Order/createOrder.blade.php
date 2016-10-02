@extends('layouts.master')
<style>

</style>
@section('content')
<h2 style="color: #5cb85c">Pick Your Food for Order</h2>
<br>

<div class="panel-body">
{{--<div class="well">--}}
{{--<form method="POST">--}}
{!! Form ::open(['method' => 'POST', 'action' => ['OrderController@addToCart']]) !!}
        <p style="display: none"> {{ $rowNo = 1 }}</p>
        <input type="hidden" name="customer_id" value="{{ 1 }}">
        <div class="row">
        @foreach($foodItems as $foodItem)
          <div class="col-sm-3">
            <table width="100" align="center">
                <tr><td style="align-content: center"><img src="{{ $foodItem->item_image_path }}" alt="{{$foodItem->name}}" height="250" width="250"></td></tr>
                <tr><td style="text-align: center">Food : {{$foodItem->item_name}}</td></tr>
                <tr><td style="text-align: center">Type : {{$foodItem->item_type}}</td></tr>
                <tr><td style="text-align: center">Unit Price : {{$foodItem->unit_price}}</td></tr>
                <tr><td style="text-align: center">Available : @if($foodItem->available_quantity != 0)Yes @else No @endif</td></tr>
                <tr><td align="center"><input class="form-control" style="width:70px" type="number" name="quantity" min="1" max="100" value="1"><br></td></tr>
                <tr><td style="text-align: center"><button class="btn btn-success">Add</button></td></tr>
            </table>
          </div>
          <p style="display: none">{{ $rowNo++ }}</p>
        @if(($rowNo/4) == 0)
            </div>
            <div><br><br></div>
            <div class="row">
        @endif
        <input type="hidden" name="item_id" value="{{$foodItem->item_id}}" >

        @endforeach
{{--{!! Form::Token() !!}--}}
{{--</form>--}}
{!! Form ::close() !!}
{{--</div>--}}

</div>


@endsection
@stop