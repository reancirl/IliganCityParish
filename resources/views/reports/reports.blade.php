@extends('layouts.master')

@section('title','Reports')
@section('style')
<style type="text/css">
	h1 {
		padding-left: 1.5em;
	}
	hr {
		border: 1px solid #0078ff;
	}
	.total-record-1
	{
		height: 8em;
	    width: 100%;
	    margin-right: 1em;
	    background-color: #0078ff;
	}
	.card-report-1 {
		background-color: #ffffff;
		height: 14em;
	    width: 95%;
	    margin-right: 1em;
	    box-shadow: 1px 1px 5px rgba(0,0,0,1);
	    margin-top: 1em;
	}
	.card-report-2 {
		background-color: #ffffff;
		height: 10em;
	    margin-top: 1em;
	    border: 1.4px solid black;
	}
	.card-report-3 {
		background-color: #ffffff;
		height: 16em;
		width: 85%;
		margin-left: 4em;
	    margin-top: 1em;
	    border: 1.4px solid black;
	}
	.hr-width {
		width: 80%;
		border: .5px solid black;
	}
	.hr-width-1 {
		width: 85%;
		border: .5px solid black;
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
	.outline--1 {
	    color: #ffffff;
	    font-size: 1.8em;
	    padding-top: 6px;
	    margin-left: 3.2em;
	    font-weight: bolder;
	    font-family: 'Impact';
	    -webkit-text-stroke:1px black;
	}
	.outline--2 {
	    color: #ffffff;
	    text-align: center;
	    font-size: 2em;
	    font-weight: bold;
	    font-family: 'Impact';
	    -webkit-text-stroke:1px black;
	}
	.btn-margin{
		margin-top: .5em;
		margin-left: 10em;
	}
</style>
@endsection
@section('content')


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

@can('super-admin')
	<h3>Diocese of Iligan Reports</h3>
	<hr>
	<section>
		<div class="row">
			<div class="col-sm-6">
				<div class="card-report-2 mr-4">
					<h1 class="outline--1 pt-2">Weekly Reports</h1>
					<hr class="hr-width">
					<h5 class="text-center">Total Number of Marriage on the latest week: {{ $cathedral_mar }}</h5>
					<a href="{{route('reports.dioceseWeekly')}}">
		    			<button type="button" class="btn btn-outline-dark btn-sm btn-margin">
	        				<i class="mdi mdi-file-document"></i>Show Weekly Reports
		    			</button>
		    		</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card-report-2 ml-4">
					<h1 class="outline--1 pt-2">Yearly Reports</h1>
					<hr class="hr-width">
					<h5 class="text-center">Total Number of Confirmation this year: {{ $cathedral_con }}</h5>
					<a href="{{route('reports.dioceseYearly')}}">
						<button type="button" class="btn btn-outline-dark btn-sm btn-margin">
							<i class="mdi mdi-file-document"></i>Show current Year Reports
						</button>
					</a>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-sm-12">
				<div class="card-report-3">
					<h1 class="outline--2 pt-3">Baptismal Record sorted by Month in {{$year}}</h1>
					<hr class="hr-width-1">
					<div class="row">
						<div class="col text-center">
							<h4 class="mb-3">January: ({{ $jan }})</h4>
							<h4 class="mb-3">February: ({{ $feb }})</h4>
							<h4 class="mb-3">March: ({{ $mar }})</h4>
							<h4 class="mb-3">April: ({{ $apr }})</h4>
						</div>
						<div class="col text-center">
							<h4 class="mb-3">May: ({{ $may }})</h4>
							<h4 class="mb-3">June: ({{ $jun }})</h4>
							<h4 class="mb-3">July: ({{ $jul }})</h4>
							<h4 class="mb-3">August: ({{ $aug }})</h4>
						</div>
						<div class="col text-center">
							<h4 class="mb-3">September: ({{ $sep }})</h4>
							<h4 class="mb-3">October: ({{ $oct }})</h4>
							<h4 class="mb-3">November: ({{ $nov }})</h4>
							<h4 class="mb-3">December: ({{ $dec }})</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endcan
@canany(['admin','cathedral-admin'])
	<h3>{{ Auth::user()->church }} Reports</h3>
	<hr>
	<section>
		<div class="row mb-4">
			<div class="col-sm-3">
				<div class="total-record-1 bg-1">
		            <div class="outline-1"><i class="mdi mdi-church"></i>{{ $baptismal }}</div>
		            <div class="outline-2">Total number of</div>
		            <div class="outline-2">baptismal records</div>
		        </div>
			</div>
			<div class="col-sm-3">
				<div class="total-record-1 bg-1">
		            <div class="outline-1"><i class="typcn typcn-document"></i>{{ $confirmation }}</div>
		            <div class="outline-2">Total number of</div>
		            <div class="outline-2"> confirmation records</div>
		        </div>
			</div>
			<div class="col-sm-3">
				<div class="total-record-1 bg-1">
		            <div class="outline-1"><i class="mdi mdi-heart-box-outline"></i>{{ $marriage }}</div>
		            <div class="outline-2">Total number of</div>
		            <div class="outline-2">marriage records</div>
		        </div>
			</div>
			<div class="col-sm-3">
				<div class="total-record-1 bg-1">
		            <div class="outline-1"><i class="typcn typcn-clipboard"></i>100</div>
		            <div class="outline-2">Total number of</div>
		            <div class="outline-2">first communion records</div>
		        </div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="card-report-1">
					<h1 class="outline-report pt-3">Weekly Reports</h1>
					<hr class="hr-width">
					<h4 class="text-center">Total Number of Marriage on the latest week: {{ count($countWeeklyMarriage)}}</h4>
					<a href="{{route('reports.weekly')}}">
		    			<button type="button" class="btn btn-primary btn-lg btn-margin">
	        				<i class="mdi mdi-file-document"></i>Show Weekly Reports
		    			</button>
		    		</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card-report-1">
					<h1 class="outline-report pt-3">Yearly Reports</h1>
					<hr class="hr-width">
					<h4 class="text-center">Total Number of Confirmation this year: {{ count($countYearly)}}</h4>
					<a href="{{route('reports.yearly')}}">
						<button type="button" class="btn btn-primary btn-lg btn-margin">
							<i class="mdi mdi-file-document"></i>Show current Year Reports
						</button>
					</a>
				</div>
			</div>
		</div>
	</section>
@endcanany
@endsection
@section('javaScript')
	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready(function() {
		    $('#reports').DataTable( {
		        "ordering": false,
		        "info":     false
		    } );
		} );
    </script> 
@endsection

