@extends('layouts/books_layout')

@section('title')
{{$book->name}} | Book
@endsection
@section('content')
<div class="d-inline-block" style="width: 18rem;">
  <img src="{{asset($book->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$book->name}}</h5>
    <p class="card-text">{{$book->desc}}</p>
    <a href="#" class="btn btn-primary">Edit</a>
    <a href="#" class="btn btn-danger">Delete</a>
  </div>
</div>

@endsection






