@extends('layouts.master')

@section('title','Confirmation')

@section('content')

<h2>Confirmation Records</h2>
	<a href="/confirmation/addConfirmation">
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
<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="confirmation">
		      <thead>
		      	<tr>
		      		<th>#</th>
		      		<th>Last Name</th>
		      		<th>First Name</th>
		      		<th>Middle Name</th>
		      		<th>Place of Confirmation</th>
		      		<th>Gender</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($confirmation as $key=>$confirmation)
		      	<tr>
		      		<td>{{++$key}}</td>
		      		<td>{{$confirmation->baptismal->last_name}}</td>
                    <td>{{$confirmation->baptismal->first_name}}</td>
                    <td>{{$confirmation->baptismal->middle_name}}</td>
                    <td>{{$confirmation->church}}</td>
                    <td>{{$confirmation->baptismal->gender}}</td>
		      		<td>
		      			<a href="/confirmation/{{$confirmation->id}}">
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
		    $('#confirmation').DataTable();
		} );
    </script> 
@endsection