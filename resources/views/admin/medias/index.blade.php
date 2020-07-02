@extends('layouts.admin')

@section('content')
<h1>Media</h1>
@if($photos)
<form action="{{route('delete.media')}}" method="post" class="form-inline">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  
  <div class="form-group">
    <select name="checkBoxArray" id="" class="form-control">
      <option value="delete">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" value="Delete" class="btn btn-danger">
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>
          <div class="form-group">
            <input type="checkbox" name="" id="options" class="form-control">
          </div>
        </th>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach($photos as $photo)
      <tr>
        <td>
          <div class="form-group">
            <input type="checkbox" name="checkBoxArray[]" id="options" class="form-control checkBoxes" value="{{$photo->id}}">
          </div>
        </td>
        <td>{{$photo->id}}</td>
        <td><img height="50" src="/cmsproject/public{{$photo->file}}" alt=""></td>
        <td>{{$photo->created_at?$photo->created_at->diffForHumans():'no date'}}</td>
        <!-- <td> -->
          <!-- {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!} -->
          <!-- <div class="form-group"> -->
            <!-- {!! Form::submit('Delete',['class'=>'btn btn-danger '])!!} -->
          <!-- </div> -->
          <!-- {!! Form::close() !!} -->
        <!-- </td> -->
      </tr>
      @endforeach

    </tbody>
  </table>
</form>
@endif

@stop
@section('scripts')
<script>
  $(document).ready(function() {
    $('#options').click(function(){
      if(this.checked){
        $('.checkBoxes').each(function(){
          this.checked=true;
        })
      }else{
        $('.checkBoxes').each(function(){
          this.checked=false;
        })
      }
    })
  });
</script>

@stop