@extends('layouts.master')

@section('title','Add Marriage Record')

@section('content')

{{$husband->confirmation->baptismal->last_name}}
,
{{$wife->confirmation->baptismal->last_name}}

<form method="POST" action="/marriage/{{$wife->id}}/{{$husband->id}}">
      {{@csrf_field()}}

      <div class="row">
      	<div class="col">
	        <div class="form-group">
	          <label for="date">Date of Marriage</label>
	          <input type="date" class="form-control" id="date date" name="date" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date') }}">
	        </div>
	      </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block btn-lg">Add Record</i></button>

</form>

@endsection