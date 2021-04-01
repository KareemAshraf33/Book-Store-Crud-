@extends('layouts/books_layout')
@section('title')
Categories
@endsection
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form action="{{url('categories/save')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>

@foreach($categories as $category)
<h4>{{$category->name}}</h4>

@foreach($category->books as $book)
{{$book->name}},
@endforeach


@endforeach

@endsection
