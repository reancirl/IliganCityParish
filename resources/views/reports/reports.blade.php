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
	.card-report-1 {
		background-color: #ffffff;
		height: 14em;
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


@canany(['admin','cathedral-admin'])
	<h3>{{ Auth::user()->church }} Reports</h3>
	<hr>
	<section>
		<div class="row mb-4">
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

