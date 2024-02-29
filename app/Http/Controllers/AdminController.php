<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
	public function loginForm(){
		return view('admin.login');
	}
	public function login(Request $request){
		$password=$request->input('password');
		
		//Check if the password is correct
		
		if($password==='1234'){
			$request->session()->('admin',true);
			return redirect()->route('bethelattendance.index');
		}else{
			//password is incorrect, redirect back with error message
			return redirect()->back()->with('error','incorrect Passsword');
		}
	}
}
