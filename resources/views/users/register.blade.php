@extends('layouts/books_layout')
@section('title')
Register
@endsection
@section('content')
<h1>Register</h1>
<form action="{{url('/users/save')}}" method="post">
  @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection

