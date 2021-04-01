@extends('layouts/books_layout')

@section('title')
Route - All Books
@endsection
@section('content')

  <div class="container" style="padding-top:30px;">
   <div class="row justify-content-center">
     @foreach($books as $book) 
            <div class="d-inline-block" style="display:inline-block;background-color:#f8f8f8;padding:5px;border-radius:3px;position:relative;">
                <div class="card" style="width: 18rem;">
                  <img src="{{asset($book->image)}}" class="card-img-top" alt="{{$book->name}}">
                  <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">{{$book->desc}}</p>
                    <a href="{{url('books/edit',$book->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('books/delete',$book->id)}}" class="btn btn-danger">Delete</a>
                  </div>
                </div>
            
        </div>
       @endforeach
    </div>
</div>  

@endsection










