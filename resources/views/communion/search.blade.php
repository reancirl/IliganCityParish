@extends('layouts.master')

@section('title','First Communion | Search Baptismal Record')

@section('content')

<h2>Add First Communion Record</h2>
<a href="/first-communion">
  <button type="button" class="btn btn-outline-primary">
  	<i class="typcn typcn-arrow-left"></i>Go back
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
<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover table-bordered rounded" id="communion">
		      <thead>
		      	<tr>
		      		<th>Name</th>
		      		<th>Gender</th>
		      		<th>Church</th>
		      		<th width="10%"></th>
		      	</tr>
		      </thead>
		      <tbody>
		      	@foreach($communion as $communion)
		      	@if(is_null($communion->communion))
			      	<tr>
                        <td>{{$communion->first_name}} {{$communion->first_name}}, {{$communion->middle_name}}</td>
                    	<td> {{$communion->gender}} </td>
                    	<td>{{$communion->date_of_birth}}</td>
                    	<td>
	                      <a href="{{url('first-communion/'.$communion->id.'/create')}}">
	                        <button class="btn btn-outline-primary" >Add Confirmaion Record</button>
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
		    $('#communion').DataTable();
		} );
    </script> 
@endsection