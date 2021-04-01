<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
class BookController extends Controller
{
     function list(){
        //select all books 
        $books=Book::get();
        //return view 
        return view('books',[
            'books'=>$books
        ]);
    }

function show($id)
    {
        //select book with id = $id
        $book=Book::where('id','=',$id)->first();
        //return view for this book
        return view('show',[
            'book'=>$book,
            'author'=>'Tariq Senosy'
        ]);
    }
    function get($char)
    {
        //select book with char = $char
        $books=Book::where('name','like','%'.$char.'%')->get();
        //return view for this book
        return view('get',[
            'books'=>$books,
            'author1'=>'Tariq Senosy'
        ]);
    }
    
   function create(){
        //get all categories
        $categories=Category::get();
        return view('create',[
            'categories'=>$categories
        ]);
    }


       function store(Request $request){
        
    $validator = \Validator::make($request->all(), 
        [ 
        'name' => 'required|max:100|min:3', 
        'desc' => 'required|max:100|min:3', 
        'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 
    if($validator->fails()) 
        { 
            return redirect('books/create') 
                ->withErrors($validator) 
                ->withInput(); 
        }

        //proceess image 
        
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            
            $destinationPath = public_path('/images'); 
            
            $image->move($destinationPath, $name); $imagePath='images/'.$name; 
        }
        //dd($request->all());
     $_name=$request->name;
     $_desc=$request->desc;    
        //insert into db 
        $book=new Book();
        $book->name=$_name;
        $book->desc=$_desc;
        $book->image=$imagePath;//
        $book->save();
        $book->categories()->attach($request->categories);
        return redirect('/books/list');
        
    }
  function edit($id){
        //get the book 
        $book=Book::find($id);
        //
        return view('edit',[
            'book'=>$book
        ]);
    }
    function update($id, Request $request){
        
         $validator = \Validator::make($request->all(), 
        [ 
        'name' => 'required|max:100|min:3', 
       'desc' => 'required|max:100|min:3', 
        'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 
    if($validator->fails()) 
        { 
            return redirect('books/edit/'.$id) 
                ->withErrors($validator) 
                ->withInput(); 
        }

        
        //inputs
        $_name=$request->name;
        $_desc=$request->desc;
        //select 
        $book=Book::find($id);
        $book->name=$_name;
        $book->desc=$_desc;
        
         if ($request->hasFile('image')) {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            
            $destinationPath = public_path('/images'); 
            
            $image->move($destinationPath, $name); $imagePath='images/'.$name; 
            //lw f sora ll ktab asln , remove it 
             if(isset($book->image))
                 unlink($book->image);
             $book->image=$imagePath;
        }
        
        
        $book->save();
        
        return redirect('/books/list');
    }
    
    function delete($id)
    {
        //get book
        $book=Book::find($id);
        if(isset($book->image))
            unlink($book->image);
        //delete the book
        $book->delete();
        return redirect('/books/list');
    }



}
