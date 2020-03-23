@extends('layouts.master')

@section('title','Search Husband Record')

@section('content')

<!-- <a href="/marriage/wife/{{$wife->id}}">
	<button type="button" class="btn btn-outline-primary">
	  	<i class="typcn typcn-arrow-left"></i>Go Back
	</button>
</a> -->

  <h3>Bride info</h3>
	<div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"value="{{$wife->confirmation->baptismal->last_name}}, {{$wife->confirmation->baptismal->first_name}} {{$wife->confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_birth">Status</label>
            <input type="text" class="form-control" readonly value="{{ $wife->status }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="gender">Parents Type of Marriage</label>
            <input type="text" class="form-control" readonly value="{{ $wife->confirmation->baptismal->gender }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label>Education</label>
            <input type="text" class="form-control" readonly value="{{ $wife->education }}">
          </div>
        </div>
      </div>
<hr style="border: 1px solid #0078ff;">
<div class="alert alert-primary" role="alert">
	Search for Male Confirmation Records
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
		      		@if($confirmation->baptismal->gender == 'Male' and empty($confirmation->husband->marriage))
		      			<tr>
	                        <td>
	                        	{{$confirmation->baptismal->last_name}},{{$confirmation->baptismal->first_name}} 						{{$confirmation->baptismal->middle_name}} 
	                        </td>
	                    	<td>{{Carbon\Carbon::parse($confirmation->baptismal->date_of_birth)->formatLocalized('%b %d, %Y')}}</td>
	                    	<td>
	                      		<a href="/marriage/husband/{{$wife->id}}/{{$confirmation->id}}">
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