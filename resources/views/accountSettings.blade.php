@extends('layouts.master')
@section('title','Account Settings')
@section('content')
<h3>User Settings</h3>
<a href="{{ route('account.edit') }}">
  <button type="button" class="btn btn-primary">
    Update Username & Email Here
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
@if (session()->has('message'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

<form method="post" action="{{ route('account.store') }}">
{{@csrf_field()}}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" required autofocus>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input id="new_password" type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" required autofocus>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <br>
    </div>
    <div class="col-sm-6">
        <div class="form-group text-center">
            <label for="new_confirm_password">New Confirm Password</label>
            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" value="{{ old('new_confirm_password') }}" required autofocus>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Password</button>
</form>
@endsection