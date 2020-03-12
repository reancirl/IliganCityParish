@extends('layouts.master')

@section('title','Home')
@section('style')
<style type="text/css">
	h1 {
		padding-left: 1.5em;
	}
	hr {
		border: 1px solid #0078ff;
	}
	.card-report {
		background-color: #ffffff;
		height: 95%;
	    width: 95%;
	    margin-right: 1em;
	    border-radius: 45px/5px;
	    box-shadow: 1px 1px 5px rgba(0,0,0,1);
	    margin-top: 1em;
	}
	.card-report-1 {
		background-color: #ffffff;
		height: 12em;
	    width: 95%;
	    margin-right: 1em;
	    border-radius: 45px/5px;
	    box-shadow: 1px 1px 5px rgba(0,0,0,1);
	    margin-top: 1em;
	}
	.hr-width {
		width: 80%;
	}
	.outline-report {
	    color: #ffffff;
	    font-size: 2.8em;
	    padding-top: 6px;
	    margin-left: .5em;
	    font-weight: bolder;
	    font-family: 'Impact';
	    -webkit-text-stroke:1px #0078ff;
	}
	.btn-margin{
		margin-top: .5em;
		margin-left: 8em;
	}
</style>
@endsection
@section('content')
<div class="row mb-3">
	<div class="col-sm-3">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="mdi mdi-church"></i>{{ $baptismal }}</div>
            <div class="outline-2">Total number of baptismal records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="typcn typcn-document"></i>{{ $confirmation }}</div>
            <div class="outline-2">Total number of confirmation records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="mdi mdi-heart-box-outline"></i>{{ $marriage }}</div>
            <div class="outline-2">Total number of marriage records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="total-record bg-1">
            <div class="outline-1"><i class="typcn typcn-clipboard"></i>100</div>
            <div class="outline-2">Total number of first communion</div>
        </div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-sm-6">
			<div class="card-report-1">
				<h1 class="outline-report">Weekly Reports</h1>
				<hr class="hr-width">
				<h4 class="text-center">Total Number of Marriage on the latest week: {{$countWeeklyMarriage}}</h4>
				<a href="{{route('weeklyPDF')}}">
	    			<button type="button" class="btn btn-primary btn-lg btn-margin">
        				<i class="mdi mdi-file-document"></i>Show Weekly Reports
	    			</button>
	    		</a>
			</div>
			<div class="card-report-1">
				<h1 class="outline-report">Yearly Reports</h1>
				<hr class="hr-width">
				<h4 class="text-center">Total Number of Confirmation this year: {{$countYearly}}</h4>
				<a href="{{route('yearlyPDF')}}">
					<button type="button" class="btn btn-primary btn-lg btn-margin">
						<i class="mdi mdi-file-document"></i>Show current Year Reports
					</button>
				</a>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card-report">
				<h1 class="outline-report">Monthly Reports</h1>
				<hr class="hr-width">
				<h4 class="text-center mb-3">Total number of Baptismal Record by Month:</h4>
				<div class="ml-5">
					<div class="row">
						<div class="col-sm-6 mb-2"><h4>January: </h4></div>
						<div class="col-sm-6 mb-2"><h4>February: </h4></div>
						<div class="col-sm-6 mb-2"><h4>March: </h4></div>
						<div class="col-sm-6 mb-2"><h4>April: </h4></div>
						<div class="col-sm-6 mb-2"><h4>May: </h4></div>
						<div class="col-sm-6 mb-2"><h4>June: </h4></div>
						<div class="col-sm-6 mb-2"><h4>July: </h4></div>
						<div class="col-sm-6 mb-2"><h4>August: </h4></div>	
						<div class="col-sm-6 mb-2"><h4>September: </h4></div>
						<div class="col-sm-6 mb-2"><h4>October: </h4></div>
						<div class="col-sm-6 mb-2"><h4>November: </h4></div>
						<div class="col-sm-6 mb-2"><h4>December: </h4></div>
				</div>
			</div>
		</div>
	</div>
</section>












<!-- 
<div class="row">
	<div class="col-sm-9">
		
	</div>
	<div class="col-sm-3">
		<a href="#">
			<button type="button" class="btn btn-outline-primary btn-lg mb-2">
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
</div> -->

@endsection
