<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class uploadCantroller extends Controller
{
    public function index()
    {
    	return  view('upload.upload');
    }
    public function store(request $request)	
    {
    	if($request->hasFile('img'))
    	{
	    	$request->file('img');
    			return $request->img->store('public');
    	}
    }
    public function show()
    {
    	$url=Storage::url('book.pdf');
    	return "<embed src='".$url."' type='application/pdf'   height='300px' width='100%'>;
";
    }
}
