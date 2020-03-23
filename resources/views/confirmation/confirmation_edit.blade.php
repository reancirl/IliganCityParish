@extends('layouts.master')

@section('title','Edit Baptismal Record')

@section('content')

<h3>{{$confirmation->baptismal->first_name}} {{$confirmation->baptismal->last_name}} confirmation record</h3>
	<a href="/confirmation/{{$confirmation->id}}">
    	<button type="button" class="btn btn-outline-primary">
        <i class="typcn typcn-arrow-left"></i>
     		Go Back
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

<h3>Personal Details</h3>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="first_name">Name</label>
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
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" readonly value="{{ $confirmation->baptismal->place_of_birth }}">
          </div>
        </div>
      </div>

<form method="post" action="/confirmation/{{$confirmation->id}}">

      @method('PATCH')

      {{@csrf_field()}}

      <br>
      <h3>Confirmation Details</h3>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="date_of_seminar">Date of Seminar</label>
            <input type="date" class="form-control" id="date_of_seminar date" name="date_of_seminar" placeholder="First name" required autocomplete="off" value="{{ $confirmation->date_of_seminar }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_confirmation">Date of Confirmation</label>
            <input type="date" class="form-control date" id="date_of_confirmation" name="date_of_confirmation" placeholder="Last name" required autocomplete="off" value="{{ $confirmation->date_of_confirmation }}">
          </div>
        </div>
      </div>
       @canany(['super-admin','cathedral-admin'])
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="church">Place of Confirmation</label>
            <select class="form-control" id="church" name="church">
              <option value="St.Michael The Archangel Parish Church" @if($confirmation->church == 'St.Michael The Archangel Parish Church') selected @endif>
                St.Michael The Archangel Parish Church</option>
              <option value="San Lorenzo Ruiz Parish Church" @if($confirmation->church == 'San Lorenzo Ruiz Parish Church') selected @endif>
                San Lorenzo Ruiz Parish Church</option>
              <option value="San Roque Parish Church" @if($confirmation->church == 'San Roque Parish Church') selected @endif>
                San Roque Parish Church</option>
              <option value="Lord of the Holy Cross Parish Church" @if($confirmation->church == 'Lord of the Holy Cross Parish Church') selected @endif>
                Lord of the Holy Cross Parish Church</option>
              <option value="Corpus Christi Parish Church" @if($confirmation->church == 'Corpus Christi Parish Church') selected @endif>
                Corpus Christi Parish Church</option>
              <option value="Resurrection Of the Lord Parish Church" @if($confirmation->church == 'Resurrection Of the Lord Parish Church') selected @endif>
                Resurrection Of the Lord Parish Church</option>
              <option value="Redemptorist Parish Church" @if($confirmation->church == 'Redemptorist Parish Church') selected @endif>
                Redemptorist Parish Church</option>
              <option value="St. Vincent Ferrer Parish Church" @if($confirmation->church == 'St. Vincent Ferrer Parish Church') selected @endif>
                St. Vincent Ferrer Parish Church</option>
              <option value="Resurrection of The Lord Chinese-Filipino Parish Church" @if($confirmation->church == 'Resurrection of The Lord Chinese-Filipino Parish Church') selected @endif>
                Resurrection of The Lord Chinese-Filipino Parish Church</option>
              <option value="San Isidro Labrador Parish Church" @if($confirmation->church == 'San Isidro Labrador Parish Church') selected @endif>
                San Isidro Labrador Parish Church</option>
              <option value="Sto. Rosario Parish Church" @if($confirmation->church == 'Sto. Rosario Parish Church') selected @endif>
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
               <th>Gender</th>
            
               <th><a href="#a" class="addRow btn btn-success"><i class="typcn typcn-plus"></i></a></th>
             </tr>
            </thead>

            <tbody>
             <tr>
              @foreach($confirmation->confirmationSponsors as $key=>$sponsor)
               <td>
                <input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off" value="{{ $sponsor->sponsor_name }}">
              </td>


               <td>
                <select type="text" name="sponsor_gender[]" class="form-control" required autocomplete="off" value="{{ $sponsor->sponsor_gender }}">
                  <option value="Godfather" @if($sponsor->sponsor_gender == 'Godfather') selected @endif>Godfather</option>
                  <option value="Godmother" @if($sponsor->sponsor_gender == 'Godmother') selected @endif>Godmother</option>
                </select>
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
        <input type="text" class="form-control" id="facilitator_1" name="facilitator_1" required autocomplete="off" value="{{ $confirmation->confirmationFacilitator->facilitator_1 }}">
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="facilitator_2">Facilitator 2</label>
        <input type="text" class="form-control" id="facilitator_2" name="facilitator_2" required autocomplete="off" value="{{ $confirmation->confirmationFacilitator->facilitator_2 }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="facilitator_3">Facilitator 3</label>
        <input type="text" class="form-control" id="facilitator_3" name="facilitator_3" autocomplete="off" value="{{ $confirmation->confirmationFacilitator->facilitator_3 }}">
      </div>
    </div>
  </div>


      <button type="submit" class="btn btn-primary btn-lg btn-block">Update Record</button>

    </form>
<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });


    function addRow()
    {
        var tr1='<tr>'+
        '<td><input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off"></td>'+
        '<td><select type="text" name="sponsor_gender[]" class="form-control" required autocomplete="off"><option value="Godfather">Godfather</option><option value="Godmother">Godmother</option></select></td>'+
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
