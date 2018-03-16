<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('guest',['except'=>'destroy']);
	}
	
	public function create()
	{
		return view ('sessions.create');
	}
	public function store()
	{
		if (!  auth()->attempt(request(['email','password'])))
		{
			return back()->withErrors([
			'message'=>'Retry Again'
			]);
		}
		return view('cs258/index');
	}
	public function destroy()
	{
		auth()->logout();
		return view ('sessions.create');
	}
}
