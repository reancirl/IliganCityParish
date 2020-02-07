@extends('layouts.master')

@section('title','Home')

@section('content')
<h2>Home</h2>
<hr style="border: 1px solid #0078ff;">
<ul>
	<li>Generate PDF</li>
	<li>Create other users</li>
	<li>Number of baptismal records <strong>{{ count($baptismal) }}</strong></li>
	<li>Number of confirmation records <strong>{{ count($confirmation) }}</strong></li>
	<li>Number of marriage records <strong>{{ count($marriage) }}</strong></li>
</ul>

@endsection
