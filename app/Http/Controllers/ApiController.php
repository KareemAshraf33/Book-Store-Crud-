<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\User;
use Auth;

class ApiController extends Controller
{
        function books(){
        $books=Book::select('id','name','image')->get();
        return response()->json($books);
    }
    
    
    function categories(){
        $categories=Category::get();
        return response()->json($categories);
    }
    
    function register(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        //
        $user=new User();
        $user->email=$email;
        $user->password=\Hash::make($password);
        //generate token
        $user->access_toke=\Str::random(64);
        $user->save();
       return  response()->json(['access_token'=>$user->access_toke]);
        
    }
    
    function login(Request $request)
    {
        
         $cred=array('email'=>$request->email,
                    'password'=>$request->password);
        //check 
        if(Auth::attempt($cred))
        {
            //token
            if(!isset(Auth::user()->access_toke))
            {
                Auth::user()->access_toke=\Str::random(64);
                Auth::user()->save();
            }
        return response()->json(['access_token'=>Auth::user()->access_toke]);
           
            
        }else{
            //
            return "not valid email or password";
        }
        
        
    }



}
