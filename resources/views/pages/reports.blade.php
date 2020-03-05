@extends('layouts.master')

@section('title','Reports')
@section('style')
<style type="text/css">
	.card-report {
		background-color: #ffffff;
		height: 25em;
	    width: 95%;
	    margin-right: 1em;
	    border-radius: 45px/5px;
	}
	h1 {
		padding-left: 1.5em;
	}
	hr {
		border: 1px solid #0078ff;
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
</style>
@endsection
@section('content')

<h2>Reports</h2>
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
<hr>

<section>
	<div class="row">
		<div class="col">
			<div class="card-report">
				<h1 class="outline-report">Weekly Reports</h1>
				<hr class="hr-width">
				<h4 class="text-center">Total Number of Marriage this week: 10</h4>
				<a href="{{route('weeklyPDF')}}">
	    			<button type="button" class="btn btn-primary btn-lg">
        				<i class="mdi mdi-file-document"></i>Show Current Week Report
	    			</button>
	    		</a>
			</div>
		</div>
		<div class="col">
			<div class="card-report">
				<h1 class="outline-report">Monthly Reports</h1>
				<hr class="hr-width">
			</div>
		</div>
	</div>
</section>



@endsection

