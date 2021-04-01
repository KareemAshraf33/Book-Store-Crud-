@extends('layouts/books_layout')
@section('title')
Create| Book
@endsection
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach

@endif

<form action="{{url('books/store')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Book Name</label>
    <input type="text" name="name" value="{{old('name')}}"
 class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" name="desc" value="{{old('desc')}}"
 class="form-control" id="exampleInputPassword1">
  </div>
     <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file"  name="image" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection
