@extends ('layout')
@section ('content')
<h1> Sign in </h1>
<form method="POST" action="/login"> 
{{csrf_field()}}
<div class="form-group">
<label for="name">Email:</label>
<input type="email" class="form-control" id="email" name="email" required>
</div>
<div class="form-group">
<label for="name">Password:</label>
<input type="password" class="form-control" id="password" name="password" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Login</button>
</div>
</form>
@endsection