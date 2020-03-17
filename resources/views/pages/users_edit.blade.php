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
		@foreach($roles as $role)
			<div>
				<input type="radio" name="roles[]" value="{{ $role->id }}"
				@if($users->roles->pluck('id')->contains($role->id)) checked @endif>
				<label> {{ $role->name }}</label>
			</div>
		@endforeach
	</div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Record</button>
</form>
@endsection