@extends('layouts.master')

@section('title','Baptismal')

@section('content')
	<h2>Baptismal Records</h2>
	<a href="/baptismal/create">
      <button type="button" class="btn btn-outline-primary">
      	<i class="typcn typcn-plus"></i>Add Record
      </button>
    </a>
	<hr style="border: 1px solid #0078ff;">
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

	<div class="col-sm-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="baptismal">
		      <thead>
		      	<tr>
		      		<th>ID</th>
		      		<th>Last Name</th>
		      		<th>First Name</th>
		      		<th>Middle Name</th>
		      		<th>Date of Birth</th>
		      		<th>Gender</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($baptismal as $baptismal)
		      	<tr>
		      		<td>{{$baptismal->id}}</td>
		      		<td>{{$baptismal->last_name}}</td>
                    <td>{{$baptismal->first_name}}</td>
                    <td>{{$baptismal->middle_name}}</td>
                    <td>{{Carbon\Carbon::parse($baptismal->date_of_birth)->formatLocalized('%b %d, %Y')}}</td>
                    <td>{{$baptismal->gender}}</td>
		      		<td>
		      			<a href="/baptismal/{{$baptismal->id}}">
		      				<button class="btn btn-outline-primary" >View Record</button>
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

@section('javaScript')
	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready( function () {
		    $('#baptismal').DataTable();
		} );
    </script> 
@endsection
