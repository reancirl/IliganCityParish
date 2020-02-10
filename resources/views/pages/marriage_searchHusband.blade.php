@extends('layouts.master')

@section('title','Add Marriage Record')

@section('content')

<h2>Add Marriage Record</h2>

<a href="/marriage">
    <button type="button" class="btn btn-outline-primary">
      	<i class="typcn typcn-arrow-left"></i>Go Back
    </button>
  </a>
<hr style="border: 1px solid #0078ff;">
<div class="alert alert-primary" role="alert">
	<strong>1st step</strong>: Search for Male Confirmation Records
</div>

<div class="col grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		  	<h3 class="text-center "><strong>Male Confirmation Records</strong></h3>
		    <table class="table table-hover table-bordered rounded" id="male">
		      <thead>
		      	<tr>
		      		<th>Name</th>
		      		<th>Date of Birth</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($confirmation as $confirmation)
		      		@if($confirmation->baptismal->gender == 'Male' and is_null($confirmation->husband))
		      			<tr>
	                        <td>
	                        	{{$confirmation->baptismal->last_name}}, 						{{$confirmation->baptismal->first_name}} 						{{$confirmation->baptismal->middle_name}} 
	                        </td>
	                    	<td>{{$confirmation->baptismal->date_of_birth}}</td>
	                    	<td>
	                      		<a href="/husband/{{$confirmation->id}}">
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
		    $('#male').DataTable();
		} );
    </script>
@endsection