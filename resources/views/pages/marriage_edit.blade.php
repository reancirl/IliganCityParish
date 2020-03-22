@extends('layouts.master')

@section('title','Add Marriage Record')

@section('content')
<a href="/marriage/{{$marriage->id}}">
  <button type="button" class="btn btn-outline-primary">
    <i class="typcn typcn-arrow-left"></i>
    Go Back
  </button>
</a>
<section>
	<h3 class="mt-3">Couple Details</h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="name">Husband</label>
            <input type="text" class="form-control"value="{{$marriage->husband->confirmation->baptismal->last_name}}, {{$marriage->husband->confirmation->baptismal->first_name}} {{$marriage->husband->confirmation->baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="name">Wife</label>
            <input type="text" class="form-control"value="{{$marriage->wife->confirmation->baptismal->last_name}}, {{$marriage->wife->confirmation->baptismal->first_name}} {{$marriage->wife->confirmation->baptismal->middle_name}}" readonly>
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

<form method="POST" action="/marriage/{{$marriage->id}}">
      @method('PATCH')
      {{@csrf_field()}}

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="date_of_seminar">Date of Seminar</label>
            <input type="date" class="form-control" id="date_of_seminar" name="date_of_seminar" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $marriage->date_of_seminar }}">
          </div>
        </div>

      	<div class="col">
	        <div class="form-group">
	          <label for="date">Date of Marriage</label>
	          <input type="date" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ $marriage->date }}">
	        </div>
	      </div>
      </div>

      @canany(['super-admin','cathedral-admin'])
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="church">Place of Confirmation</label>
            <select class="form-control" id="church" name="church">
              <option value="St.Michael The Archangel Parish Church" @if($marriage->church == 'St.Michael The Archangel Parish Church') selected @endif>
                St.Michael The Archangel Parish Church</option>
              <option value="San Lorenzo Ruiz Parish Church" @if($marriage->church == 'San Lorenzo Ruiz Parish Church') selected @endif>
                San Lorenzo Ruiz Parish Church</option>
              <option value="San Roque Parish Church" @if($marriage->church == 'San Roque Parish Church') selected @endif>
                San Roque Parish Church</option>
              <option value="Lord of the Holy Cross Parish Church" @if($marriage->church == 'Lord of the Holy Cross Parish Church') selected @endif>
                Lord of the Holy Cross Parish Church</option>
              <option value="Corpus Christi Parish Church" @if($marriage->church == 'Corpus Christi Parish Church') selected @endif>
                Corpus Christi Parish Church</option>
              <option value="Resurrection Of the Lord Parish Church" @if($marriage->church == 'Resurrection Of the Lord Parish Church') selected @endif>
                Resurrection Of the Lord Parish Church</option>
              <option value="Redemptorist Parish Church" @if($marriage->church == 'Redemptorist Parish Church') selected @endif>
                Redemptorist Parish Church</option>
              <option value="St. Vincent Ferrer Parish Church" @if($marriage->church == 'St. Vincent Ferrer Parish Church') selected @endif>
                St. Vincent Ferrer Parish Church</option>
              <option value="Resurrection of The Lord Chinese-Filipino Parish Church" @if($marriage->church == 'Resurrection of The Lord Chinese-Filipino Parish Church') selected @endif>
                Resurrection of The Lord Chinese-Filipino Parish Church</option>
              <option value="San Isidro Labrador Parish Church" @if($marriage->church == 'San Isidro Labrador Parish Church') selected @endif>
                San Isidro Labrador Parish Church</option>
              <option value="Sto. Rosario Parish Church" @if($marriage->church == 'Sto. Rosario Parish Church') selected @endif>
                Sto. Rosario Parish Church</option>
              <!-- <option value=""></option> -->
            </select>
          </div>
        </div>
      </div>
    @endcanany

    @can('admin')
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="church">Place of Confirmation</label>
            <input type="text" class="form-control" id="church" name="church" value="{{ Auth::user()->church }}" readonly>
          </div>
        </div> 
      </div>
    @endcan

    <br>
    <h3>Sponsor Details</h3>
    <div class="form-group" >
         <table class="table table-bordered">
            <thead>
             <tr>
               <th>Sponsor Name</th>
            
               <th><a href="#a" class="addRow btn btn-success"><i class="typcn typcn-plus"></i></a></th>
             </tr>
            </thead>

            <tbody>
             <tr>
              @foreach($marriage->marriageSponsors as $key=>$sponsor)
               <td>
                <input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off" value="{{ $sponsor->sponsor_name }}">
              </td>

               <td><a href="#a" class="btn btn-danger remove"><i class="typcn typcn-delete-outline"></i></a></td>
             </tr>
             @endforeach
            </tbody>
         </table>
      </div>

  <h3>Facilitators Details</h3>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="facilitator_1">Primary Facilitator</label>
        <input type="text" class="form-control" id="facilitator_1" name="facilitator_1" required autocomplete="off" value="{{ $marriage->marriageFacilitator->facilitator_1 }}">
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="facilitator_2">Facilitator 2</label>
        <input type="text" class="form-control" id="facilitator_2" name="facilitator_2" required autocomplete="off" value="{{ $marriage->marriageFacilitator->facilitator_2 }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="facilitator_3">Facilitator 3</label>
        <input type="text" class="form-control" id="facilitator_3" name="facilitator_3" autocomplete="off" value="{{ $marriage->marriageFacilitator->facilitator_3 }}">
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-lg btn-block">Add Record</button>

</form>

<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });


    function addRow()
    {
        var tr1='<tr>'+
        '<td><input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off"></td>'+
        '<td><a href="#a" class="btn btn-danger remove"><i class="typcn typcn-delete-outline"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr1);
    };


    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("Must have atleast 1 sponsor");
        }
        else{
             $(this).parent().parent().remove();
        } 
    });
</script>

@endsection