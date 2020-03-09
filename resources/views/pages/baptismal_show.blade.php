@extends('layouts.master')

@section('title','Complete Record')

@section('content')
	<h3>{{$baptismal->first_name}} {{$baptismal->last_name}} baptismal record</h3>
	<a href="/baptismal">
      <button type="button" class="btn btn-outline-primary">
      	<i class="typcn typcn-arrow-left"></i>
        Go Back
      </button>
    </a>
    <div class="float-right">
		<a href="/baptismal/{{$baptismal->id}}/edit">
			<button type="button" class="btn btn-outline-primary">
				<i class="typcn typcn-document"></i>Edit Record
			</button>
		</a>
	</div>
	<hr style="border: 1px solid #0078ff;">

	<table class="table">
		  <tbody>
		    <tr>
		      <th scope="row">First Name</th>
		      <td>{{$baptismal->first_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Last Name</th>
		      <td>{{$baptismal->last_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Middle Name</th>
		      <td>{{$baptismal->middle_name}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Date of Birth</th>
		      <td>{{Carbon\Carbon::parse($baptismal->date_of_birth)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Gender</th>
		      <td>{{$baptismal->gender}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Place of Birth</th>
		      <td>{{$baptismal->place_of_birth}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Place of Baptismal</th>
		      <td>{{$baptismal->place_of_baptism}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Date of Seminar</th>
		      <td>{{Carbon\Carbon::parse($baptismal->date_of_attending_seminar)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		     <tr>
		      <th scope="row">Date of Baptismal</th>
		      <td>{{Carbon\Carbon::parse($baptismal->date_of_baptism)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Father's Name</th>
		      <td>{{$baptismal->fathers_name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Mother's maiden Name</th>
		      <td>{{$baptismal->mothers_maiden_name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Parents Address</th>
		      <td>{{$baptismal->parents_address}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Contact Number</th>
		      <td>{{$baptismal->contact_number}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Parents type of Marriage</th>
		      <td>{{$baptismal->parents_type_of_marriage}}</td>
		    </tr>

		    @foreach($baptismal->baptismalSponsors as $key=>$sponsor)
	        	<tr>
	        		<th>Sponsor {{++$key}} </th>
	        		<td>{{$sponsor->sponsor_name}}, ({{$sponsor->sponsor_gender}}) </td>
	        	</tr>
	        @endforeach

		    <tr>
		      <th scope="row">Created on</th>
		      <td>{{Carbon\Carbon::parse($baptismal->created_at)->formatLocalized('%b %d, %Y')}}</td>
		    </tr>

		  </tbody>
		</table>


@endsection