@extends('layouts.master')

@section('title','Add First Communion Record')

@section('content')

<h3>Add First Communion Record</h3>
	<a href="{{ route('communion.index') }}">
    	<button type="button" class="btn btn-outline-primary">
     		<i class="typcn typcn-arrow-left"></i>Go Back
    	</button>
  	</a>
<hr style="border: 1px solid #0078ff;">

<form method="post" action="{{url('/first-communion/' . $communion->id)}}">

      {{@csrf_field()}}

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" id="name" name="name" readonly value="{{ $communion->last_name }} {{ $communion->first_name }}, {{ $communion->middle_name }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" readonly value="{{ $communion->gender }}">
          </div>
        </div>
      </div>

     <div class="row">
  @can('super-admin')
    <div class="col">
      <div class="form-group">
        <label for="church">Church of Communion</label>
        <select class="form-control" id="church" name="church">
          <option value="St.Michael The Archangel Parish Church">St.Michael The Archangel Parish Church</option>
          <option value="San Lorenzo Ruiz Parish Church">San Lorenzo Ruiz Parish Church</option>
          <option value="San Roque Parish Church">San Roque Parish Church</option>
          <option value="Lord of the Holy Cross Parish Church">Lord of the Holy Cross Parish Church</option>
          <option value="Corpus Christi Parish Church">Corpus Christi Parish Church</option>
          <option value="Resurrection Of the Lord Parish Church">Resurrection Of the Lord Parish Church</option>
          <option value="Redemptorist Parish Church">Redemptorist Parish Church</option>
          <option value="St. Vincent Ferrer Parish Church">St. Vincent Ferrer Parish Church</option>
          <option value="Resurrection of The Lord Chinese-Filipino Parish Church">Resurrection of The Lord Chinese-Filipino Parish Church</option>
          <option value="San Isidro Labrador Parish Church">San Isidro Labrador Parish Church</option>
          <option value="Sto. Rosario Parish Church">Sto. Rosario Parish Church</option>
          <!-- <option value=""></option> -->
        </select>
      </div>
    </div> 
  @endcan

  @can('cathedral-admin')
    <div class="col">
      <div class="form-group">
        <label for="church">Church of Communion</label>
        <input type="text" class="form-control" id="church" name="church" value="St.Michael The Archangel Parish Church" readonly>
      </div>
    </div> 
  @endcan

  @can('admin')
    <div class="col">
      <div class="form-group">
        <label for="church">Church of Communion</label>
        <input type="text" class="form-control" id="church" name="church" value="{{ Auth::user()->church }}" readonly>
      </div>
    </div> 
  @endcan
  <div class="col">
    <div class="form-group">
      <label for="last_name">Date of Birth</label>
      <input type="text" class="form-control" name="date_of_birth" readonly value="{{ $communion->date_of_birth }}">
    </div>
  </div>
</div>


<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Update Record</button>
</form>

@endsection