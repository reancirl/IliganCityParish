@extends('layouts.master')

@section('title','First Communion')

@section('content')
	<h2>First Communion Records</h2>
	<a href="{{route('communion.search')}}">
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

	<div class="col-sm-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="communion">
		      <thead>
		      	<tr>
		      		<th>#</th>
		      		<th>Name</th>
		      		<th>Gender</th>
		      		<th>Church of First Communion</th>
		      		<th width="20%">Action</th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($communion as $key=>$communion)
		      	<tr>
		      		<td>{{++$key}}</td>
		      		<td>{{$communion->baptismal->last_name}} {{$communion->baptismal->first_name}}, {{$communion->baptismal->middle_name}}</td>
                    <td>{{$communion->baptismal->gender}}</td>
                    <td>{{$communion->church}}</td>
		      		<td>
		      			@canany(['super-admin','cathedral-admin'])
		      			<a href="/first-communion/{{$communion->id}}/edit">
		      				<button class="btn btn-secondary float-left mr-1" >Edit</button>
		      			</a>
		      			@endcanany
		      			<form action="/first-communion/{{$communion->id}}" method="post">
		      				@csrf
                            @method('DELETE')
			      			<button class="btn btn-danger" type="submit">Delete</button>
		      			</form>
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
		    $('#communion').DataTable();
		} );
    </script> 
@endsection
