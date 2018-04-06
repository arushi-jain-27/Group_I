<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>List of Results</title>
  <h1 align="center"> Pending Request </h1>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      body {
  font-family: "Source Sans Pro", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
}

a {
  color: #000;
  text-decoration: none;
}

.wrapper {
  width: 100%;
  max-width: 800px;
  margin: 2rem auto;
  position: relative;
}

.post-list-subhead {
  text-transform: uppercase;
  color: #aaa;
  border-bottom: 1px solid #eee;
  padding: 0.4em 0;
  font-size: 80%;
  font-weight: 500;
  letter-spacing: 0.1em;
}

.post-item {
  padding: 10px 20px;
  margin: 10px 0;
  border-left: 1px solid #EEE;
}
.post-item:hover {
  background-color: #ddd;
}

.post-item-title {
  font-size: 1.25em;
  color: #222;
  font-weight: bold;
}
.post{
  font-size: 125%;
  padding :0.5em;
  color: #6495ED;
  margin-top: 1em;
}
.post-item-category {
  margin: 0 0.1em;
  padding: 0.2em 1em;
  color: #fff;
  background: #000;
  font-size: 80%;
  text-decoration: none;
}

.post-item-more {
  text-transform: uppercase;
  border: 0.1px solid #000;
  padding: 2px 8px;
  margin: 0;
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<?php

						foreach($results as $results)	{
						
							
							$t=$results->t;
							$a=$results->a;
							$p=$results->p;
							$g=$results->g;
							$n=$results->n;
							$d=$results->d;
							$l=$results->l;
							echo "<a href='http://127.0.0.1:8000/admin/$n' ><div class='wrapper'>
<div class='post-list'>  
<section class='post-item'>
		    <div>
            <h3 class='post-item-title'>Accession No. : </h3> $n 
        </div>
        <header >
            <h2 class='post-item-title'>Title : </h2> $t
        </header>
       <header >
            <h2 class='post-item-title'>Author : </h2>$a
        </header>
        <header >
            <h2 class='post-item-title'>Publisher : </h2>$p
        </header>
        <header >
            <h2 class='post-item-title'>Genre : </h2>$g
        </header>
		<header >
            <h2 class='post-item-title'>Language : </h2> $l
        </header>
		<header >
            <h2 class='post-item-title'>Description : </h2> $d
        </header>
  
</a>";
?>
<header style="margin: 10px">			<form method='post' action='/add' enctype='multipart/form-data' >
  {{ csrf_field() }}
  <select name='m' >
  <option value='i'>Insert</option>
  <option value='e'>Remove</option>
  </select>
  <div class='form-group'>
   <input type='hidden' name='ide' value=<?php echo  $n; ?> readonly>
   </div>
   <button type='submit' class='btn btn-primary'>Submit</button>
   </form></div>
   </header>
    </section>
</div>
</div>   				 
	<?php				 }			 
       				
?>
</body>
</html>