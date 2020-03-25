@extends('layouts.master')

@section('title','User Management-Create')
@section('content')
<h3>Add new user</h3>
	<a href="{{ url('/users') }}">
    	<button type="button" class="btn btn-outline-primary">
     		<i class="typcn typcn-arrow-left"></i>Go Back
    	</button>
  	</a>
<hr style="border: 1px solid #0078ff;">
@if (session()->has('error'))
<div class="col-sm-12">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
    	<strong>Sorry!</strong> {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
	@endif
@if(count($errors)>0)
  <ul>
    @foreach($errors->all() as $error)
      <li class="alert alert-danger">{{$error}}</li>
    @endforeach
  </ul>
@endif

<form method="post" action="{{ url('/users/store') }}">
{{@csrf_field()}}
<div class="row">
	<div class="col-sm-5">
		<div class="form-group">
	        <label for="name">Username</label>
	        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        <div class="form-group">
	        <label for="email">Email</label>
	        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
	</div>
	<div class="col-sm-5 ml-5">
		<h5>Roles</h5>
		<div class="form-group">
			<input type="checkbox" name="roles" value="1" onclick="onlyOne(this)">
			<label class="mr-3 mt-1"> SuperAdmin</label>

			<input type="checkbox" name="roles" value="2" onclick="onlyOne(this)">
			<label class="mr-3 mt-1"> CathedralAdmin</label>

			<input type="checkbox" name="roles" value="3" onclick="onlyOne(this)" id="test">
			<label class="mr-3 mt-1"> Admin</label>
		</div>
		<div class="form-group" id="test1" style="display: none">
			<label for="church" class="mt-1">Church</label>
	        <select class="form-control" id="church" name="church" value="{{ old('church') }}">
	        <option value="San Lorenzo Ruiz Parish Church">San Lorenzo Ruiz Parish Church</option>
	        <option value="San Roque Parish Church">San Roque Parish Church</option>
	        <option value="Lord of the Holy Cross Parish Church">Lord of the Holy Cross Parish Church</option>
	        <option value="Corpus Christi Parish Church">Corpus Christi Parish Church</option>
	        <option value="Resurrection Of the Lord Parish Church">Resurrection Of the Lord Parish Church</option>
	        <option value="Redemptorist Parish Church">Redemptorist Parish Church</option>
	        <option value="St. Vincent Ferrer Parish Church">St. Vincent Ferrer Parish Church</option>
	        <option value="Resurrection of The Lord Chinese-Filipino Parish Church">Resurrection of The Lord Chinese-Filipino Parish Church</option>
	        <option value="San Isidro Labrador Parish Church">San Isidro Labrador Parish Church</option>
	        <option value="Sto. Rosario Parish Church">Sto. Rosario Parish Church</option>
	        <!-- <option value=""></option> -->
	        </select>
		</div>
	</div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Add User</button>
</form>
@endsection

@section('javaScript')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#test").click(function () {
            if ($(this).is(":checked")) {
                $("#test1").show();
            } else {
                $("#test1").hide();
            }
        });
    });
</script>
<script type="text/javascript">
	function onlyOne(checkbox) {
	    var checkboxes = document.getElementsByName('roles')
	    checkboxes.forEach((item) => {
	        if (item !== checkbox) item.checked = false
	    })
	}
</script>
@endsection