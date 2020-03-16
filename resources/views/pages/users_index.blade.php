@extends('layouts.master')

@section('title','User Management')

@section('content')
<h2>User Management</h2>
<hr style="border: 1px solid #0078ff;">

<div class="col-sm-12 grid-margin stretch-card">
	<div class="card">
	  <div class="card-body">
	    <table class="table table-hover table-bordered rounded" id="users">
	      <thead>
	      	<tr>
	      		<th>Username</th>
	      		<th>Email</th>
	      		<th>Role</th>
	      		<th>Church</th>
	      		<th>Action</th>
	      	</tr>
	      </thead>
	      <tbody>
	      	@foreach($users as $user)
	      	<tr>
	      		<td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                <td>St.Michael The Archangel</td>
	      		<td>
	      			<a href="{{ url('users/edit/'. $user->id)}}">
	      				<button class="btn btn-outline-primary" >Edit Record</button>
	      			</a>
	      		</td>
	      	</tr>
	      	@endforeach
		  </tbody>
	    </table>
	  </div>
	</div>
</div>
@endsection