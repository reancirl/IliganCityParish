@extends('layouts.master')

@section('title','Add Confirmation Record')

@section('content')

<h2>Add Confirmation Record</h2>

<a href="/addMarriage">
    <button type="button" class="btn btn-outline-primary">
      <i class="typcn typcn-arrow-left"></i>Go Back
    </button>
  </a>
<hr style="border: 1px solid #0078ff;">
<div class="alert alert-primary" role="alert">
	<strong>2nd step</strong>: Fill in all the required fields
</div>
<h3>Personal Details</h3>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"value="{{$confirmation->baptismal->last_name}}, {{$confirmation->baptismal->first_name}} {{$confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control date" readonly value="{{ $confirmation->baptismal->date_of_birth }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" readonly value="{{ $confirmation->baptismal->gender }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" readonly value="{{ $confirmation->baptismal->place_of_birth }}">
          </div>
        </div>
      </div>

<div class="alert alert-primary" role="alert">
	<strong>3rd step</strong>: Search for Female Confirmation Recods
</div>

<div class="col grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		  	<h3 class="text-center "><strong>Female Confirmation Records</strong></h3>
		    <table class="table" id="female">
		      <thead>
		      	<tr>
		      		<th>Name</th>
		      		<th>Date of Birth</th>
		      		<th></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($baptismal as $key=>$baptismal)
		      		@if($baptismal->gender == 'Female' and isset($baptismal->confirmation))
		      			<tr>
	                        <td>
	                        	{{$baptismal->last_name}}, 						{{$baptismal->first_name}} 						{{$baptismal->middle_name}}
	                        </td>
	                    	<td>{{$confirmation->baptismal->date_of_birth}}</td>
	                    	<td>
	                      		<a href="/addMarriage/{{$confirmation->id}}">
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
		    $('#female').DataTable();
		} );
    </script>
@endsection
