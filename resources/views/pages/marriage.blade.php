@extends('layouts.master')

@section('title','Marriage')

@section('content')

<h2>Marriage Records</h2>
	<a href="/marriage/wife">
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

<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="marriage">
		      <thead>
		      	<tr>
		      		<th>ID</th>
		      		<th>Husband Name</th>
		      		<th>Wife Name</th>
		      		<th>Date of Marriage</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($marriage as $marriage)
		      	<tr>
		      		<td>{{$marriage->id}}</td>
		      		<td>{{$marriage->husband->confirmation->baptismal->last_name}}, {{$marriage->husband->confirmation->baptismal->first_name}} {{$marriage->husband->confirmation->baptismal->middle_name}}</td>

                    <td>{{$marriage->wife->confirmation->baptismal->last_name}}, {{$marriage->wife->confirmation->baptismal->first_name}} {{$marriage->wife->confirmation->baptismal->middle_name}}</td>
                    <td>{{$marriage->date}}</td>
		      		<td>
		      			<a href="/marriage/{{$marriage->id}}">
		      				<button class="btn btn-outline-primary" >Complete Record</button>
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
		    $('#marriage').DataTable();
		} );
    </script> 
@endsection