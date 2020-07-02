@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_post'))
<p class="alert alert-danger">{{session('deleted_post')}}</p>
@elseif(Session::has('updated_post'))
<p class="alert alert-success">{{session('updated_post')}}</p>
@elseif(Session::has('created_post'))
<p class="alert alert-success">{{session('created_post')}}</p>
@elseif(Session::has('permission_post'))
<p class="alert alert-warning">{{session('permission_post')}}</p>
@endif
<h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Photo</th>
      <th>Title</th>
      <th>Owner</th>
      <th>Category</th>
      <th>Post link</th>
      <th>Comments</th>
      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
    @if($posts)
    @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img height="50" src="{{$post->photo?'/cmsproject/public'.$post->photo->file : $post->photoPlaceHolder()}}" alt=""></td>
      <td><a href="{{route('posts.edit',$post->id)}}">{{Str::limit($post->title,20)}}</a></td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->category_id?$post->category->name:'no category'}}</td>
      <td><a href="{{route('home.post',$post->slug)}}">View post</a></td>
      <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
    @endif

  </tbody>
</table>
<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
    {{$posts->render()}}
  </div>
</div>
@stop