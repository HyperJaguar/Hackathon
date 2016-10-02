@extends('layouts.master')
@section('content')

    <div class="jumbotron text-center">
      <h1>Update</h1>
      <p>Food Items</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            {{--{!!Form::open(['action'=>'foodItemController@create', 'method'=>'POST'])!!}--}}
            {{--{{ Form::open(array('url' => 'foo/bar','method'=>'POST')) }}--}}
            <form method="post" action="{{ action('foodItemsController@create') }}">
            {{--<form action="create" method="post">--}}
              <div class="form-group">
                  <label for="itemName">Item Name</label>
                  <input type="text" class="form-control" id="itemName" placeholder="Enter User Name">
              </div>

              <div class="form-group">
                <label for="itemPrice">Item Price</label>
                <input type="number" class="form-control" id="itemPrice" placeholder="Enter Price/Unit">
              </div>
              <div class="form-group">
                  <label for="unitType">Unit Type</label>
                  <input type="text" class="form-control" id="unitType" placeholder="Enter Unit Type">
              </div>
              <div class="form-group">
                  <label for="quantity">Available Quantity</label>
                  <input type="number" class="form-control" id="quantity" placeholder="Enter Available Quantity">
              </div>
              <div class="form-group">
                  <label class="control-label">Select File</label>

                  <input type='file' onchange="readURL(this);" name="orderImage" />


              </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            {{--{!!Form::token()!!}--}}

        </div>
        <div class="col-sm-4">
        <br>
        <img id="blah" src="http://placehold.it/300x250" alt="your image" />
        </div>
      </div>

    </div>
    <br>
    <br>

    <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@stop
