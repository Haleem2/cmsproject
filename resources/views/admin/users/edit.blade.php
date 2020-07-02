@extends('layouts.admin')

@section('content')
<h1>Edit Users</h1>
<div>
@include('includes.form_errors')
</div>
<div class="col-sm-3">
<img height="400" src="{{$user->photo?'/cmsproject/public'.$user->photo->file:'https://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
  
  {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
  <!-- @csrf -->
  <div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name' , null ,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email','Email') !!}
    {!! Form::email('email' , null ,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('role_id','Role') !!}
    {!! Form::select('role_id' ,$roles,null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('is_active','Status') !!}
    {!! Form::select('is_active' ,[1=>'Active',0=>'Not Active'],null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password','Password') !!}
    {!! Form::password('password' ,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::file('photo_id',null ,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('update User',['class'=>'btn btn-info col-sm-6'])!!}
  </div>
  {!! Form::close() !!}
  {!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
  <div class="form-group">
    {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6'])!!}
  </div>
  {!! Form::close() !!}
</div>
@stop