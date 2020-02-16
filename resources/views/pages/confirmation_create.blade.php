@extends('layouts.master')

@section('title','Add Confirmation Record')

@section('content')

<h2>Add Confirmation Record</h2>
  <a href="/confirmation/addConfirmation">
    <button type="button" class="btn btn-outline-primary">
      Go Back
    </button>
    <br>
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
            <input type="text" class="form-control"value="{{$baptismal->last_name}}, {{$baptismal->first_name}} {{$baptismal->middle_name}}" readonly>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control date" readonly value="{{ $baptismal->date_of_birth }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" readonly value="{{ $baptismal->gender }}">
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" readonly value="{{ $baptismal->place_of_birth }}">
          </div>
        </div>
      </div>

<form method="POST" action="/confirmation/{{$baptismal->id}}">

      {{@csrf_field()}}

    <br>
    <h3>Confirmation Details</h3>

    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="date_of_seminar">Date of Seminar</label>
          <input type="date" class="form-control" id="date_of_seminar date" name="date_of_seminar" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date_of_seminar') }}">
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="date_of_confirmation">Date of Confirmation</label>
          <input type="date" class="form-control" id="date_of_confirmation date" name="date_of_confirmation" placeholder="dd/mm/yyyy" required autocomplete="off" value="{{ old('date_of_confirmation') }}">
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
               <td><input type="text" name="sponsor_name[]" class="form-control" required autocomplete="off"></td>


               <td>
                <select type="text" name="sponsor_gender[]" class="form-control" required autocomplete="off">
                  <option value="Godfather">Godfather</option>
                  <option value="Godmother">Godmother</option>
                </select>
               </td>

               <td><a href="#a" class="btn btn-danger remove"><i class="typcn typcn-delete-outline"></i></a></td>
             </tr>

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



    <button type="submit" class="btn btn-primary btn-lg btn-block">Add Record</button>

    </form>

@endsection