@extends('layouts/books_layout')
@section('title')
Notes
@endsection
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form action="{{url('users/savenote')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <input type="text" value="{{old('content')}}" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
@foreach(Auth::user()->notes as $note)
<h3>{{$note->content}} - {{$note->user->email}} </h3>
@endforeach
@endsection
