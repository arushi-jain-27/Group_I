<?php
$book_id=$book_id1;
?>
@extends ('layout')
@section ('content')
	<h1> Add a New Translation</h1>
	<form method="post" action="/addtrans" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" id="name" placeholder="Translation Name" name="name" required>
	<input type="hidden" name="book_id" value="<?php print $book_id?>">
  </div>
	
  <div class="form-group">
    <label for="translator">translator</label>
    <input type="text" class="form-control" id="translator" placeholder="Translator" name="translator" >
  </div>
  <div class="form-group">
    <label for="publisher">publisher</label>
    <input type="text" class="form-control" id="publisher" placeholder="publisher" name="publisher" >
  </div>
  
  <div class="form-group">
    <label for="publisher">language</label>
    <input type="text" class="form-control" id="language" placeholder="language" name="language" >
  </div> 
  
  <div class="form-group">
    <label for="keywords">Keywords</label>
    <textarea id="keywords" class="form-control" placeholder="keywords" name="keywords" ></textarea>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" class="form-control" placeholder="description" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="year">Year Published</label>
    <input type="integer" class="form-control" id="year" placeholder="year" name="year" >
	</div>
	<div class="form-group">
    <label for="file">Select file to upload</label>
    <input type="file" class="form-control" id="file" placeholder="File" name="file" >
	</div>
  
  
  

  
  <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection