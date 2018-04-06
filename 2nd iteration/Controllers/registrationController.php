<?php

namespace App\Http\Controllers;

use App\User;
//use App\Mail\Welcome;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
class registrationController extends Controller
{
    //
	public function create()
	{
		return view ('registrations.create');
	}
	public function store()
	{
		$this->validate(request(),[
		'name'=>'required',
		'username'=>'required',
		'email'=>'required|email',
		'password'=>'required'
		]);
		
		$user=User::create([
		'name'=> request('name'),
		'username'=> request('username'),
		'email'=> request('email'),
		'password'=>bcrypt(request('password'))]);
		
		auth()->login($user);
		//Mail::to($user)->send(new Welcome);
		//return redirect()->home();
		return view ('registrations.success');
	}
}
