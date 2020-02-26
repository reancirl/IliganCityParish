@extends('layouts.master')

@section('title','Add Marriage Record')

@section('content')


<section>
	<h3>Couple Details</h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">Husband to be name</label>
            <input type="text" class="form-control"value="{{$husband->confirmation->baptismal->last_name}}, {{$husband->confirmation->baptismal->first_name}} {{$husband->confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="name">Wife to be name</label>
            <input type="text" class="form-control"value="{{$wife->confirmation->baptismal->last_name}}, {{$wife->confirmation->baptismal->first_name}} {{$wife->confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>
      </div>
</section>
<hr style="border: 1px solid #0078ff;">
@if(count($errors)>0)
  <ul>
    @foreach($errors->all() as $error)
      <li class="alert alert-danger">{{$error}}</li>
    @endforeach
  </ul>
@endif
<div class="alert alert-primary" role="alert">
	Fill in all the required fields
</div>

<form method="POST" action="/marriage/{{$wife->id}}/{{$husband->id}}">
      {{@csrf_field()}}

      <div class="row">
      	<div class="col">
	        <div class="form-group">
	          <label for="date">Date of Marriage</label>
	          <input type="date" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date') }}">
	        </div>
	      </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_seminar">Date of Marriage</label>
            <input type="date_of_seminar" class="form-control" id="date_of_seminar" name="date_of_seminar" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date_of_seminar') }}">
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block btn-lg">Add Record</i></button>

</form>

@endsection