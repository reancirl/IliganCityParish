@extends('layouts.master')

@section('title','Search for Confirmation Record')

@section('content')

<h2>Add Marriage Record</h2>
<a href="/marriage/husband/{{$wife->id}}">
  <button type="button" class="btn btn-outline-primary">
    <i class="typcn typcn-arrow-left"></i>Go Back
  </button>
</a>
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
<h3>Personal Details</h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"value="{{$confirmation->baptismal->last_name}}, {{$confirmation->baptismal->first_name}} {{$confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control date" readonly value="{{ $confirmation->baptismal->date_of_birth }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" readonly value="{{ $confirmation->baptismal->gender }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label>Date of Confirmation</label>
            <input type="text" class="form-control" readonly value="{{ $confirmation->date_of_confirmation }}">
          </div>
        </div>
      </div>
<form method="POST" action="/marriage/create/{{$wife->id}}/{{$confirmation->id}}">
      {{@csrf_field()}}

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="Never Married">Never Married</option>
              <option value="Widowed">Widowed</option>
              <option value="Common-law">Common-law</option>
              <option value="Married">Married</option>
              <option value="Annulled Marriage">Annulled Marriage</option>
            </select>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="education">Education</label>
            <select class="form-control" id="education" name="education">
              <option value="No Secondary">No Secondary</option>
              <option value="Trade/Apprenticeship">Trade/Apprenticeship</option>
              <option value="Non-university certificate/diploma">Non-university certificate/diploma</option>
              <option value="Secondary">Secondary</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col">
          <div class="form-group">
            <label for="updated_parents_type_of_marriage">Parents type of marriage</label>
            <select class="form-control" id="updated_parents_type_of_marriage" name="updated_parents_type_of_marriage">
              <option value="Civil">Civil</option>
              <option value="Church">Church</option>
            </select>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="parents_marriage_place">Parents marriage place</label>
            <input type="text" class="form-control" id="parents_marriage_place" name="parents_marriage_place" placeholder="If not married. Put none" required autocomplete="off" value="{{ old('parents_marriage_place') }}">
          </div>
        </div>

      </div>

      <button type="submit" class="btn btn-primary">Next step<i class="typcn typcn-arrow-right"></i></button>

</form>
@endsection