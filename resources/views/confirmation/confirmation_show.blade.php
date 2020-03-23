@extends('layouts.master')

@section('title','Complete Record')

@section('content')

<h3>{{$confirmation->baptismal->first_name}} {{$confirmation->baptismal->last_name}} Confirmation Record</h3>
	<a href="/confirmation">
      <button type="button" class="btn btn-outline-primary">
      	<i class="typcn typcn-arrow-left"></i>
        Go Back
      </button>
    </a>
<div class="float-right">
		<a href="/confirmation/{{$confirmation->id}}/edit">
			<button type="button" class="btn btn-outline-primary">Edit Record</button>
		</a>
	</div>
	<hr style="border: 1px solid #0078ff;">

	<table class="table">
		  <tbody>
		    <tr>
		      <th scope="row">First Name</th>
		      <td>{{$confirmation->baptismal->first_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Last Name</th>
		      <td>{{$confirmation->baptismal->last_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Middle Name</th>
		      <td>{{$confirmation->baptismal->middle_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Date of Birth</th>
		      <td>{{Carbon\Carbon::parse($confirmation->baptismal->date_of_birth)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Gender</th>
		      <td>{{$confirmation->baptismal->gender}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Place of Confirmation</th>
		      <td>{{$confirmation->church}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Place of Birth</th>
		      <td>{{$confirmation->baptismal->place_of_birth}}</td>
		    </tr>
		    @foreach($confirmation->confirmationSponsors as $key=>$sponsor)
	        	<tr>
	        		<th>Sponsor {{++$key}} </th>
	        		<td>{{$sponsor->sponsor_name}}, ({{$sponsor->sponsor_gender}}) </td>
	        	</tr>
	        @endforeach
	        
	        <tr>
		      <th scope="row">Primary Facilitator</th>
		      <td>{{$confirmation->confirmationFacilitator->facilitator_1}}</td>
		    </tr>
	    
	    	<tr>
		      <th scope="row">Facilitator 2</th>
		      <td>{{$confirmation->confirmationFacilitator->facilitator_2}}</td>
		    </tr>

	    	<tr>
		      <th scope="row">Facilitator 3</th>
		      <td>{{$facilitator_3}}</td>
		    </tr>

		    <tr>
		      <th scope="row">Date of Seminar</th>
		      <td>{{Carbon\Carbon::parse($confirmation->date_of_seminar)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Date of Confirmation</th>
		      <td>{{Carbon\Carbon::parse($confirmation->date_of_confirmation)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Created on</th>
		      <td>{{Carbon\Carbon::parse($confirmation->created_at)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>		     
		  </tbody>
		</table>


@endsection