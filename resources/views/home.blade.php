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
						<form>
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" name="name" type="txt" placeholder="Name">
							</div>

							<div class="form-group">
								<label for="itNumber">IT Number</label>
								<input class="form-control" name="itNumber" type="txt" placeholder="DIT Number">
							</div>

							<div class="form-group">
								<label>Users Role</label>


								<div class="inner-addon right">
									<i class="glyphicon glyphicon-user"></i>
									<input class="form-control" list="role"><span class="caret"></span></input>
								</div>
								<datalist id="role" >
									<option name="cashire">Cashire</option>
									<option name="student">Student</option>
								</datalist>
							</div>


						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
