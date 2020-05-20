@extends('layouts.master')
@section('title','Account Settings')
@section('content')
<h3>User Settings</h3>
<a href="{{ route('account.index') }}">
  <button type="button" class="btn btn-primary">
    Update Password Here
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

<form method="post" action="{{ route('account.update') }}">
{{@csrf_field()}}
<div class="row mb-2 pt-2">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="name" required autocomplete="off" value="{{ $user->name }}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" required autocomplete="off" value="{{ $user->email }}">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Update Info</button>
</form>
@endsection