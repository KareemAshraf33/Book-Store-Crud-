<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    //
       function register(){
        return view('users/register');
    }
    function save(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        //
        $user=new User();
        $user->email=$email;
        $user->password=\Hash::make($password);
        $user->save();
       return redirect('books/list');
        
    }
    
     function login(){
        return view('users/login');
    }
    function handlelogin(Request $request){
        //validation
        //auth
        $cred=array('email'=>$request->email,
                    'password'=>$request->password);
        //check 
        if(Auth::attempt($cred))
        {
            //
            return redirect('books/list');
        }else{
            //
            return "not valid email or password";
        }
        
        
    }
    function logout(){
        
        Auth::logout();
        return redirect('/users/login');
    }



}
