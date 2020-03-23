@extends('layouts.master')

@section('title','Complete Record')

@section('content')

<h3>Mr & Mrs {{$marriage->husband->confirmation->baptismal->last_name}} - Marriage Record</h3>
	<a href="/marriage">
      <button type="button" class="btn btn-outline-primary">
      	<i class="typcn typcn-arrow-left"></i>
        Go Back
      </button>
    </a>
<div class="float-right">
		<a href="/marriage/{{$marriage->id}}/edit">
			<button type="button" class="btn btn-outline-primary">Edit Record</button>
		</a>
	</div>
	<hr style="border: 1px solid #0078ff;">
	<h3>Marriage Details</h3>
	<table class="table">
		  <tbody>
		    <tr>
		      <th scope="row">Husband Name</th>
		      <td>{{$marriage->husband->confirmation->baptismal->last_name}}, {{$marriage->husband->confirmation->baptismal->first_name}} {{$marriage->husband->confirmation->baptismal->middle_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Wife Name</th>
		      <td>{{$marriage->wife->confirmation->baptismal->last_name}}, {{$marriage->wife->confirmation->baptismal->first_name}} {{$marriage->wife->confirmation->baptismal->middle_name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Place of Marriage</th>
		      <td>{{$marriage->church}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Date of marriage</th>
		      <td>{{Carbon\Carbon::parse($marriage->date)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		    @foreach($marriage->marriageSponsors as $key=>$sponsor)
	        	<tr>
	        		<th>Sponsor {{++$key}} </th>
	        		<td>{{$sponsor->sponsor_name}}</td>
	        	</tr>
	        @endforeach
	        
	        <tr>
		      <th scope="row">Primary Facilitator</th>
		      <td>{{$marriage->marriageFacilitator->facilitator_1}}</td>
		    </tr>
	    
	    	<tr>
		      <th scope="row">Facilitator 2</th>
		      <td>{{$marriage->marriageFacilitator->facilitator_2}}</td>
		    </tr>

	    	<tr>
		      <th scope="row">Facilitator 3</th>
		      <td>{{$facilitator_3}}</td>
		    </tr>

		    <tr>
		      <th scope="row">Date of Seminar</th>
		      <td>{{Carbon\Carbon::parse($marriage->date_of_seminar)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Created on</th>
		      <td>{{Carbon\Carbon::parse($marriage->created_at)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>		     
		  </tbody>
		</table>
		<hr  style="border: 1px solid #0078ff;">
		<br>
		<h3>Husband details</h3>
		<table class="table">
		    <tbody>
		    	<tr>
			      <th scope="row">Education Status</th>
			      <td>{{$marriage->husband->education}}</td>
			    </tr>
			    <tr>
			      <th scope="row">Parents Type of Marriage</th>
			      <td>{{$marriage->husband->updated_parents_type_of_marriage}}</td>
			    </tr>
			    <tr>
			      <th scope="row">Parents Marriage Place</th>
			      <td>{{$husband_parents}}</td>
			    </tr>
		    </tbody>
		</table>
		<br>
		<h3>Wife details</h3>
		<table class="table">
		    <tbody>
		    	<tr>
			      <th scope="row">Education Status</th>
			      <td>{{$marriage->wife->education}}</td>
			    </tr>
			    <tr>
			      <th scope="row">Parents Type of Marriage</th>
			      <td>{{$marriage->wife->updated_parents_type_of_marriage}}</td>
			    </tr>
			    <tr>
			      <th scope="row">Parents Marriage Place</th>
			      <td>{{$wife_parents}}</td>
			    </tr>
		    </tbody>
		</table>
@endsection