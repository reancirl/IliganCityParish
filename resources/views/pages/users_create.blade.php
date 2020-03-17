@extends('layouts.master')

@section('title','User Management-Create')
@section('style')
<style type="text/css">
	.mt-3-5{
		margin-top: 15px;
	}
</style>
@endsection
@section('content')
<h3>Add new user</h3>
	<a href="{{ url('/users') }}">
    	<button type="button" class="btn btn-outline-primary">
     		<i class="typcn typcn-arrow-left"></i>Go Back
    	</button>
  	</a>
<hr style="border: 1px solid #0078ff;">

<form method="post" action="{{ url('/users/store') }}">
{{@csrf_field()}}
<div class="row">
	<div class="col-sm-5">
		<div class="form-group">
	        <label for="name">Username</label>
	        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

	        @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
	        <label for="email">Email</label>
	        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
	</div>
	<div class="col-sm-5 ml-5">
		<h5>Roles</h5>
		<div>
		@foreach($roles as $role)
			<input type="radio" name="roles" value="{{ $role->id }}">
			<label class="mr-3"> {{ $role->name }}</label>
		@endforeach
		</div>

		<div class="form-group">
	        <label for="password" class="mt-3-5">Password</label>
	        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

	        @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
	</div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Add User</button>
</form>
@endsection