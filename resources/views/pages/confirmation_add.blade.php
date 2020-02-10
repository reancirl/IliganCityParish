@extends('layouts.master')

@section('title','Add Confirmation Record')

@section('content')

<h2>Add Confirmation Record</h2>
<div class="alert alert-primary" role="alert">
	First step: Search for the Existing Baptismal Record
</div>

<a href="/confirmation">
    <button type="button" class="btn btn-outline-primary">
      <i class="typcn typcn-arrow-left"></i>Go Back
    </button>
  </a>
<hr style="border: 1px solid #0078ff;">

<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="addConfirmation">
		      <thead>
		      	<tr>
		      		<th>Name</th>
		      		<th>Gender</th>
		      		<th>Date of Birth</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($baptismal as $baptismal)
		      		@if(is_null($baptismal->confirmation))
				      	<tr>
		                        <td>{{$baptismal->last_name}}, {{$baptismal->first_name}} {{$baptismal->middle_name}} </td>
		                    	<td> {{$baptismal->gender}} </td>
		                    	<td>{{$baptismal->date_of_birth}}</td>
		                    	<td>
		                      <a href="/confirmation/{{$baptismal->id}}/create">
		                        <button class="btn btn-outline-primary" >This Record</button>
		                      </a>
		                    </td>
				      	</tr>
		      		@endif
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
		    $('#addConfirmation').DataTable();
		} );
    </script> 
@endsection