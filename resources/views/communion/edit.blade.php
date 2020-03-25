@extends('layouts.master')

@section('title','Edit First Communion Record')

@section('content')

<h3>{{$baptismal->last_name}} {{$baptismal->first_name}}, {{$baptismal->middle_name}}</h3>
	<a href="{{ route('communion.index') }}">
    	<button type="button" class="btn btn-outline-primary">
     		<i class="typcn typcn-arrow-left"></i>Go Back
    	</button>
  	</a>
<hr style="border: 1px solid #0078ff;">

<form method="post" action="{{url('/first-communion/' . $communion->id)}}">
      @method('PATCH')
      {{@csrf_field()}}

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" id="name" name="name" readonly value="{{ $baptismal->last_name }} {{ $baptismal->first_name }}, {{ $baptismal->middle_name }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" readonly value="{{ $baptismal->gender }}">
          </div>
        </div>
      </div>

     <div class="row">
  @canany(['super-admin','cathedral-admin'])
    <div class="col">
      <div class="form-group">
        <label for="church">Church of Communion</label>
        <select class="form-control" id="church" name="church">
              <option value="St.Michael The Archangel Parish Church" @if($communion->church == 'St.Michael The Archangel Parish Church') selected @endif>
                St.Michael The Archangel Parish Church</option>
              <option value="San Lorenzo Ruiz Parish Church" @if($communion->church == 'San Lorenzo Ruiz Parish Church') selected @endif>
                San Lorenzo Ruiz Parish Church</option>
              <option value="San Roque Parish Church" @if($communion->church == 'San Roque Parish Church') selected @endif>
                San Roque Parish Church</option>
              <option value="Lord of the Holy Cross Parish Church" @if($communion->church == 'Lord of the Holy Cross Parish Church') selected @endif>
                Lord of the Holy Cross Parish Church</option>
              <option value="Corpus Christi Parish Church" @if($communion->church == 'Corpus Christi Parish Church') selected @endif>
                Corpus Christi Parish Church</option>
              <option value="Resurrection Of the Lord Parish Church" @if($communion->church == 'Resurrection Of the Lord Parish Church') selected @endif>
                Resurrection Of the Lord Parish Church</option>
              <option value="Redemptorist Parish Church" @if($communion->church == 'Redemptorist Parish Church') selected @endif>
                Redemptorist Parish Church</option>
              <option value="St. Vincent Ferrer Parish Church" @if($communion->church == 'St. Vincent Ferrer Parish Church') selected @endif>
                St. Vincent Ferrer Parish Church</option>
              <option value="Resurrection of The Lord Chinese-Filipino Parish Church" @if($communion->church == 'Resurrection of The Lord Chinese-Filipino Parish Church') selected @endif>
                Resurrection of The Lord Chinese-Filipino Parish Church</option>
              <option value="San Isidro Labrador Parish Church" @if($communion->church == 'San Isidro Labrador Parish Church') selected @endif>
                San Isidro Labrador Parish Church</option>
              <option value="Sto. Rosario Parish Church" @if($communion->church == 'Sto. Rosario Parish Church') selected @endif>
                Sto. Rosario Parish Church</option>
              <!-- <option value=""></option> -->
            </select>
      </div>
    </div> 
  @endcanany
  <div class="col">
    <div class="form-group">
      <label for="last_name">Date of Birth</label>
      <input type="text" class="form-control" name="date_of_birth" readonly value="{{ $baptismal->date_of_birth }}">
    </div>
  </div>
</div>


<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Update Record</button>
</form>

@endsection