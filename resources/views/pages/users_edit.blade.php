@extends('layouts.master')

@section('title','User Management-Edit')

@section('content')
<h3>Update {{$users->name}} user</h3>
	<a href="{{ url('/users') }}">
    	<button type="button" class="btn btn-outline-primary">
     		<i class="typcn typcn-arrow-left"></i>Go Back
    	</button>
  	</a>
<hr style="border: 1px solid #0078ff;">

@if(count($errors)>0)
  <ul>
    @foreach($errors->all() as $error)
      <li class="alert alert-danger">{{$error}}</li>
    @endforeach
  </ul>
@endif


<form method="post" action="{{url('/users/edit/' . $users->id)}}">
@method('PATCH')

{{@csrf_field()}}
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
	        <label for="name">Username</label>
	        <input type="text" class="form-control" id="name" name="name" required autocomplete="off" value="{{ $users->name }}">
        </div>
        <div class="form-group">
	        <label for="email">Email</label>
	        <input type="text" class="form-control" id="email" name="email" required autocomplete="off" value="{{ $users->email }}">
        </div>
	</div>
	<div class="col-sm-5 ml-5">
		<h5>Roles</h5>
		<div class="form-group">
			<input type="checkbox" name="roles" value="1" onclick="onlyOne(this)"
			@if($roleId == 1) checked @endif>
			<label class="mr-3 mt-1"> SuperAdmin</label>

			<input type="checkbox" name="roles" value="2" onclick="onlyOne(this)"
			@if($roleId == 2) checked @endif>
			<label class="mr-3 mt-1"> CathedralAdmin</label>

			<input type="checkbox" name="roles" value="3" onclick="onlyOne(this)" id="test"
			@if($roleId == 3) checked @endif>
			<label class="mr-3 mt-1"> Admin</label>
		</div>
		
		@if($roleId == 3)
			<div class="form-group" id="test1" style="display: block">
				<label for="church" class="mt-1">Church</label>
		        <select class="form-control" id="church" name="church">
		        <option disabled selected>Choose Church:</option>
		        <option value="San Lorenzo Ruiz Parish Church" @if($users->church == 'San Lorenzo Ruiz Parish Church') selected @endif>
		        	San Lorenzo Ruiz Parish Church</option>
		        <option value="San Roque Parish Church" @if($users->church == 'San Roque Parish Church') selected @endif>
		        	San Roque Parish Church</option>
		        <option value="Lord of the Holy Cross Parish Church" @if($users->church == 'Lord of the Holy Cross Parish Church') selected @endif>
		        	Lord of the Holy Cross Parish Church</option>
		        <option value="Corpus Christi Parish Church" @if($users->church == 'Corpus Christi Parish Church') selected @endif>
		        	Corpus Christi Parish Church</option>
		        <option value="Resurrection Of the Lord Parish Church" @if($users->church == 'Resurrection Of the Lord Parish Church') selected @endif>
		        	Resurrection Of the Lord Parish Church</option>
		        <option value="Redemptorist Parish Church" @if($users->church == 'Redemptorist Parish Church') selected @endif>
		        	Redemptorist Parish Church</option>
		        <option value="St. Vincent Ferrer Parish Church" @if($users->church == 'St. Vincent Ferrer Parish Church') selected @endif>
		        	St. Vincent Ferrer Parish Church</option>
		        <option value="Resurrection of The Lord Chinese-Filipino Parish Church" @if($users->church == 'Resurrection of The Lord Chinese-Filipino Parish Church') selected @endif>
		        	Resurrection of The Lord Chinese-Filipino Parish Church</option>
		        <option value="San Isidro Labrador Parish Church" @if($users->church == 'San Isidro Labrador Parish Church') selected @endif>
		        	San Isidro Labrador Parish Church</option>
		        <option value="Sto. Rosario Parish Church" @if($users->church == 'Sto. Rosario Parish Church') selected @endif>
		        	Sto. Rosario Parish Church</option>
		        <!-- <option value=""></option> -->
		        </select>
			</div>
		@endif
		<div class="form-group" id="test1" style="display: none">
				<label for="church" class="mt-1">Church</label>
		        <select class="form-control" id="church" name="church">
		        <option disabled selected>Choose Church:</option>
		        <option value="San Lorenzo Ruiz Parish Church" @if($users->church == 'San Lorenzo Ruiz Parish Church') selected @endif>
		        	San Lorenzo Ruiz Parish Church</option>
		        <option value="San Roque Parish Church" @if($users->church == 'San Roque Parish Church') selected @endif>
		        	San Roque Parish Church</option>
		        <option value="Lord of the Holy Cross Parish Church" @if($users->church == 'Lord of the Holy Cross Parish Church') selected @endif>
		        	Lord of the Holy Cross Parish Church</option>
		        <option value="Corpus Christi Parish Church" @if($users->church == 'Corpus Christi Parish Church') selected @endif>
		        	Corpus Christi Parish Church</option>
		        <option value="Resurrection Of the Lord Parish Church" @if($users->church == 'Resurrection Of the Lord Parish Church') selected @endif>
		        	Resurrection Of the Lord Parish Church</option>
		        <option value="Redemptorist Parish Church" @if($users->church == 'Redemptorist Parish Church') selected @endif>
		        	Redemptorist Parish Church</option>
		        <option value="St. Vincent Ferrer Parish Church" @if($users->church == 'St. Vincent Ferrer Parish Church') selected @endif>
		        	St. Vincent Ferrer Parish Church</option>
		        <option value="Resurrection of The Lord Chinese-Filipino Parish Church" @if($users->church == 'Resurrection of The Lord Chinese-Filipino Parish Church') selected @endif>
		        	Resurrection of The Lord Chinese-Filipino Parish Church</option>
		        <option value="San Isidro Labrador Parish Church" @if($users->church == 'San Isidro Labrador Parish Church') selected @endif>
		        	San Isidro Labrador Parish Church</option>
		        <option value="Sto. Rosario Parish Church" @if($users->church == 'Sto. Rosario Parish Church') selected @endif>
		        	Sto. Rosario Parish Church</option>
		        <!-- <option value=""></option> -->
		        </select>
			</div>

	</div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Record</button>
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