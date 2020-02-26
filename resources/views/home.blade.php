@extends('layouts.master')

@section('title','Home')

@section('content')
<div class="row mb-3">
	<div class="col">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="mdi mdi-church"></i>{{ count($baptismal) }}</div>
            <div class="outline-2">Total number of baptismal records</div>
        </div>
	</div>
	<div class="col">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="typcn typcn-document"></i>{{ count($confirmation) }}</div>
            <div class="outline-2">Total number of confirmation records</div>
        </div>
	</div>
	<div class="col">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="mdi mdi-heart-box-outline"></i>{{ count($marriage) }}</div>
            <div class="outline-2">Total number of marriage records</div>
        </div>
	</div>
	<div class="col">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="typcn typcn-clipboard"></i>100</div>
            <div class="outline-2">Total number of first communion</div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-sm-9">
		
	</div>
	<div class="col-sm-3">
		<a href="#">
			<button type="button" class="btn btn-outline-primary btn-lg mb-3">
        		<i class="typcn typcn-plus"></i>Add First Communion Record
	    	</button>
		</a>
	    <button type="button" class="btn btn-outline-success btn-lg mb-3">
        <i class="mdi mdi-upload"></i>Import CSV for Communion First Record
	    </button>
	    <a href="{{route('weeklyPDF')}}">
	    	<button type="button" class="btn btn-outline-dark btn-lg mb-3">
        		<i class="mdi mdi-file-document"></i>Show/Generate PDF:Weekly Report
	    	</button>
	    </a>
	    <button type="button" class="btn btn-outline-danger btn-lg">
        <i class="mdi mdi-alert"></i>Delete Record: Baptismal, Confirmation and Marriage
	    </button>
	</div>
</div>

@endsection
