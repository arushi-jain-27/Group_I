@extends ('layout')
@section ('content')
	<h1> Add a New Book</h1>
	<form method="get" action="/addrec">
	{{ csrf_field() }}
	<div class="form-group">
    <label for="accession_no">accession_no</label>
    <input type="integer" class="form-control" id="accession_no" placeholder="accession_no" name="accession_no" required>
  </div>
	
  <div class="form-group">
    <label for="title">title</label>
    <input type="text" class="form-control" id="title" placeholder="title" name="title" required>
  </div>
  <div class="form-group">
    <label for="author">author</label>
    <input type="text" class="form-control" id="author" placeholder="author" name="author" required>
  </div>
  <div class="form-group">
    <label for="publisher">publisher</label>
    <input type="text" class="form-control" id="publisher" placeholder="publisher" name="publisher" required>
  </div>
  <div class="form-group">
    <label for="genre">genre</label>
    <input type="text" class="form-control" id="genre" placeholder="genre" name="genre" required>
  </div>
  <div class="form-group">
    <label for="publisher">language</label>
    <input type="text" class="form-control" id="language" placeholder="language" name="language" required>
  </div> 
  
  <div class="form-group">
    <label for="keywords">Keywords</label>
    <textarea id="keywords" class="form-control" placeholder="keywords" name="keywords" required></textarea>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" class="form-control" placeholder="description" name="description" required></textarea>
  </div>
  <div class="form-group">
    <label for="year">Year Published</label>
    <input type="integer" class="form-control" id="year" placeholder="year" name="year" required>
	</div>
  
  
  

  
  <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection