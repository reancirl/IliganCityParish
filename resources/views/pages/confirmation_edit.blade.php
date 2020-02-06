@extends('layouts.master')

@section('title','Edit Baptismal Record')

@section('content')

<h3>{{$confirmation->baptismal->first_name}} {{$confirmation->baptismal->last_name}} confirmation record</h3>
	<a href="/confirmation/{{$confirmation->id}}">
    	<button type="button" class="btn btn-outline-primary">
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

               <td></td>
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