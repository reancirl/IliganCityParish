@extends('layouts.master')

@section('title','Edit Baptismal')

@section('content')

<h3>{{$baptismal->first_name}} {{$baptismal->last_name}} baptismal record</h3>
	<a href="/baptismal/{{$baptismal->id}}">
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

<form method="post" action="{{url('/baptismal/' . $baptismal->id)}}">

      @method('PATCH')

      {{@csrf_field()}}

<h3>Personal Details</h3>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required autocomplete="off" value="{{ $baptismal->first_name }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required autocomplete="off" value="{{ $baptismal->last_name }}">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle name" required autocomplete="off" value="{{ $baptismal->middle_name }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth date" name="date_of_birth" placeholder="Date of Birth" required autocomplete="off" value="{{ $baptismal->date_of_birth }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
              <option value="Male" @if($baptismal->gender == 'Male') selected @endif>Male</option>
              <option value="Female" @if($baptismal->gender == 'Female') selected @endif>Female</option>
            </select>
        </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" required autocomplete="off" value="{{ $baptismal->place_of_birth }}">
          </div>
        </div>
      </div>

      <div class="row">
      @canany(['super-admin','cathedral-admin'])
        <div class="col">
          <div class="form-group">
            <label for="place_of_baptism">Place of Baptismal</label>
            <select class="form-control" id="place_of_baptism" name="place_of_baptism" value="{{ old('place_of_baptism') }}">
              <option value="St.Michael The Archangel Parish">St.Michael The Archangel Parish</option>
              <option value="San Lorenzo Ruiz Parish">San Lorenzo Ruiz Parish</option>
              <option value="San Roque Parish">San Roque Parish</option>
              <option value="Lord of the Holy Cross Parish">Lord of the Holy Cross Parish</option>
              <option value="Corpus Christi Parish">Corpus Christi Parish</option>
              <option value="Resurrection Of the Lord Parish">Resurrection Of the Lord Parish</option>
              <option value="Redemptorist Parish">Redemptorist Parish</option>
              <option value="St. Vincent Ferrer Parish">St. Vincent Ferrer Parish</option>
              <option value="Resurrection of The Lord Chinese-Filipino Parish">Resurrection of The Lord Chinese-Filipino Parish</option>
              <option value="San Isidro Labrador Parish">San Isidro Labrador Parish</option>
              <option value="Sto. Rosario Parish">Sto. Rosario Parish</option>
              <!-- <option value=""></option> -->
            </select>
          </div>
        </div> 
      @endcanany

      @can('admin')
        <div class="col">
          <div class="form-group">
            <label for="place_of_baptism">Place of Baptismal</label>
            <input type="text" class="form-control" id="place_of_baptism" name="place_of_baptism" value="{{ Auth::user()->church }}" readonly>
          </div>
        </div> 
      @endcan

        <div class="col">
          <div class="form-group">
            <label for="date_of_attending_seminar">Date of Seminar</label>
            <input type="date" class="form-control" id="date_of_attending_seminar date" name="date_of_attending_seminar" placeholder="Date of Seminar" required autocomplete="off" value="{{ $baptismal->date_of_attending_seminar }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="date_of_baptism">Date of Baptismal</label>
            <input type="date" class="form-control" id="date_of_baptism date" name="date_of_baptism" placeholder="Date of Baptismal" required autocomplete="off" value="{{ $baptismal->date_of_baptism }}">
          </div>
        </div>
      </div>



      <br>
      <h3>Parents Information</h3>

     <div class="row">
       <div class="col">
          <div class="form-group">
            <label for="fathers_name">Father's Name</label>
            <input type="text" class="form-control" id="fathers_name" name="fathers_name" placeholder="Father's Name" required autocomplete="off" value="{{ $baptismal->fathers_name }}">
          </div>
       </div>

       <div class="col">
        <div class="form-group">
          <label for="mothers_maiden_name">Mother's maiden Name</label>
          <input type="text" class="form-control" id="mothers_maiden_name" name="mothers_maiden_name" placeholder="Mother's maiden name" required autocomplete="off" value="{{ $baptismal->mothers_maiden_name }}">
        </div>
       </div>
     </div>

     <div class="row">
       <div class="col">
          <div class="form-group">
            <label for="parents_address">Parents Address</label>
            <input type="text" class="form-control" id="parents_address" name="parents_address" placeholder="Parents Address" required autocomplete="off" value="{{ $baptismal->parents_address }}">
          </div>
       </div>

       <div class="col">
          <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required autocomplete="off" value="{{ $baptismal->contact_number }}">
          </div>
       </div>
     </div>

     <div class="row">
       <div class="col-sm-6">
          <div class="form-group">
            <label for="parents_type_of_marriage">Parents type of Marriage</label>
              <select class="form-control" id="parents_type_of_marriage" name="parents_type_of_marriage" value="{{ old('parents_type_of_marriage') }}">
                <option value="Church" @if($baptismal->parents_type_of_marriage == 'Church') selected @endif>Church</option>
                <option value="Civil" @if($baptismal->parents_type_of_marriage == 'Civil') selected @endif>Civil</option>
                <option value="Not-married" @if($baptismal->parents_type_of_marriage == 'Not-married') selected @endif>Not-married</option>
              </select>
          </div>
       </div>
     </div>


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
              @foreach($baptismal->baptismalSponsors as $key=>$sponsor)
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

      <button type="submit" class="btn btn-primary btn-lg btn-block">Update Record</button>

    </form>

@endsection


@section('javaScript')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>    
@endsection