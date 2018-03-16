<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 10; 
    var wrapper         = $(".input_fields_wrap"); 
    var add_button      = $(".add_field_button"); 
    
    var x = 1;
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++;
            $(wrapper).append('<div> <select name="name[]"> <option value="AND">AND</option> <option value="OR">OR</option><option value="NOT">NOT</option></select><input type="text" name="mytext[]"/><select name="place[]"> <option value="title">title</option> <option value="author">author</option><option value="publisher">publisher</option><option value="genre">genre</option><option value="language">language</option><option value="translations">translations</option><option value="keywords">keywords</option><option value="description">description</option></select><a href="#" class="remove_field">Remove</a></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<form action="/search1" method="get">
{{ csrf_field() }}
<div class="input_fields_wrap">

    <button class="add_field_button">Add More Fields</button>
    <div>
    <select name="name[]">
  <option value="AND">AND</option>
  <option value="OR">OR</option>
  <option value="NOT">NOT</option>
	</select>
	<input type="text" name="mytext[]"/>
	<!-- <textarea id="mytext[]" name="mytext[]"></textarea> -->
	<select name="place[]"> 
	<option value="title">title</option> 
	<option value="author">author</option>
	<option value="publisher">publisher</option>
	<option value="genre">genre</option>
	<option value="language">language</option>
	<option value="translations">translations</option>
	<option value="keywords">keywords</option>
	<option value="description">description</option>
	</select>
	

</div>
</div>
<input type="submit" value="Submit">
</form>
</body>
</html>