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
            <label for="date_of_seminar">Date of Seminar</label>
            <input type="date" class="form-control" id="date_of_seminar" name="date_of_seminar" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date_of_seminar') }}">
          </div>
        </div>

      	<div class="col">
	        <div class="form-group">
	          <label for="date">Date of Marriage</label>
	          <input type="date" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date') }}">
	        </div>
	      </div>
      </div>

      @can('super-admin')
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="church">Place of Marriage</label>
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
      </div>
    @endcan
    @can('cathedral-admin')
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="church">Place of Confirmation</label>
            <input type="text" class="form-control" id="church" name="church" value="St.Michael The Archangel Parish Church" readonly>
          </div>
        </div> 
      </div>
    @endcan

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
               <td><input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off"></td>

               <td><a href="#a" class="btn btn-danger remove"><i class="typcn typcn-delete-outline"></i></a></td>
             </tr>

            </tbody>
         </table>
      </div>

  <h3>Facilitators Details</h3>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="facilitator_1">Primary Facilitator</label>
        <input type="text" class="form-control" id="facilitator_1" name="facilitator_1" required autocomplete="off" value="{{ old('facilitator_1') }}">
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="facilitator_2">Facilitator 2</label>
        <input type="text" class="form-control" id="facilitator_2" name="facilitator_2" required autocomplete="off" value="{{ old('facilitator_2') }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="facilitator_3">Facilitator 3</label>
        <input type="text" class="form-control" id="facilitator_3" name="facilitator_3" autocomplete="off" value="{{ old('facilitator_3') }}">
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