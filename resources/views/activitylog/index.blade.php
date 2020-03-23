@extends('layouts.master')

@section('title','Activity Log')

@section('content')

<h2>Activity Log</h2>

<hr style="border: 1px solid #0078ff;">

<table class="table table-sm">
  <thead>
    <tr>
      <th style="font-weight: bolder;"  width="17%">Module:</th>
      <th style="font-weight: bolder;" class="text-center">Description:</th>
      <th style="font-weight: bolder;" class="text-center">Time:</th>
      <th style="font-weight: bolder;" class="text-center">Record name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($activity as $key=>$act)
    <tr>
      <td>{{$act->log_name}}</td>
      <td class="text-center">{{$act->description}} by <strong>{{$act->causer->name}}</strong> </td>
      <td class="text-center">{{Carbon\Carbon::parse($act->created_at)->formatLocalized('%b %d, %Y - %H:%M')}}</td>
      <td class="text-center">
        {{$act->subject->name}} {{$act->subject->first_name}} {{$act->subject->last_name}}
        @if(isset($act->subject->baptismal->first_name)) 
          {{$act->subject->baptismal->first_name}} {{$act->subject->baptismal->last_name}}
        @endif
        @if(isset($act->subject->husband->confirmation->baptismal->last_name) and isset($act->subject->wife->confirmation->baptismal->last_name)) 
          {{$act->subject->husband->confirmation->baptismal->last_name}} - {{$act->subject->wife->confirmation->baptismal->last_name}}
        @endif
      </td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection

