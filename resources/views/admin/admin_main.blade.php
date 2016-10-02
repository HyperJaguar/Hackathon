@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <!-- Adding panel to add a user -->
                    <div class="panel panel-success">
                        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Add new Cashier/Students</div>

                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" method="POST" action="{{ url('/admin') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="name" type="txt" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="itNumber">IT Number</label>
                                    <input class="form-control" name="itNumber" type="txt" placeholder="DIT Number">
                                </div>

                                <div class="form-group has-success has-feedback">
                                    <label for="role">Users Role</label>
                                    <input name="role" id="role" class="form-control" list="roleList" aria-describedby="inputSuccess2Status">
                                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    <datalist id="roleList" >
                                        <option name="cashire">Cashire</option>
                                        <option name="student">Student</option>
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">E-Mail Address</label>
                                    <div>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <input class="form-control btn btn-success" type="submit" value="Confirm">

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
