<!DOCTYPE HTML>
<html>
<head>
<style>
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
  margin: 20px 0;
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
<title>Online Library IITI</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<div class="btm_border">
<div class="h_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
		</div>
		<div class="clear"></div>
	</div>
	<div class='h_btm'>
		<div class='cssmenu'>
			<ul>
			   <li class='active'><a href='/'><span>Home</span></a></li>
			    <li><a href='/adv1'><span>Filter Search</span></a></li>
			    <li><a href='/adv2'><span>Advanced Search</span></a></li>
			    <li class='has-sub'><a href='/login'><span>Login</span></a></li>
			    <li class='last'><a href='/register'><span>Sign Up</span></a></li>
			 	<div class="clear"></div>
			 </ul>
	</div>
	<div class="search">
    	<form>
    		<input type="text" Placeholder="Basic Search" value="">
    		<input type="submit" value="">
    	</form>
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
</div>
<!------ Slider_bg ------------>
<div class="services">
					<div class="services-header">
						<h3 align="center">Advanced Search Results</h3>
						<div class="clear"> </div>
					</div>
      
<div class="col-container">

  <div class="col" >
	<div class='h_btm'>
	<div class="searchh">
    	<form>
    		<input type="text" Placeholder="Advanced Search 2" value="">
    		<input type="submit" value="">
    	</form>
	</div>
	<div class="clear"></div>
	
  </div>
  </div>  
  
<?php		
$user_id= auth()->id();
if (empty($user_id))
	$user_id=0;
				
foreach($results as $results)	{
	$sql=DB::select ("select book.accession_no as n, book.title as t, book.year as y, book.place as pl, author.name as a, publisher.name as p, genre.name as g, language.name as l, book.description as d from book, author, book_author, publisher, book_publisher, genre, book_genre, language, book_language where book.book_id=$results->book_id and book.book_id=book_author.book_id and author.author_id=book_author.author_id and book.book_id=book_publisher.book_id and publisher.publisher_id=book_publisher.publisher_id and book.book_id=book_genre.book_id and genre.genre_id=book_genre.genre_id and book.book_id=book_language.book_id and language.language_id=book_language.language_id");
	$t=$sql[0]->t;
							$a=$sql[0]->a;
							$pl=$sql[0]->pl;
							$p=$sql[0]->p;
							$g=$sql[0]->g;
							$n=$sql[0]->n;
							$d=$sql[0]->d;
							$l=$sql[0]->l;
							$y=$sql[0]->y;
							$id1=DB::select ("select relations.id as k from relations where relations.book_id=$results->book_id ");
							$id=$id1[0]->k;
	echo "<div class='wrapper' >
  <div class='post-list'>  
<section class='post-item'>
		
        <header >
          <a href='http://127.0.0.1:8000/search2/$id/$user_id' >  <h1 style='color:#FF3383;' class='post-item-title'>  $t</h1></a>
        </header>
       
		$a.",". $t.",".$pl.",".$p.",".$y
    </section>
</div>
   </div>";
 }
 ?>
 
</div>
</div>
<!--footer-->
<div class="footer-bg">	
<div class="wrap">
<div class="footer">
  <div class="box1">
	<h4 class="btm">What We Do</h4>
	<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. ions from the 1914 below for those  by H. Rackham</p>
	<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those The standard chunk of Lorem Ipsum used since the 1500s is reproduced reproduced</p>
  </div>
   <div class="box1">
	<h4 class="btm">Categories</h4>
	<nav>
		<ul>
			<li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
			<li><a href="#">Duis a augue ac libero euismod viverra sitth</a></li>
			<li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
			<li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
			<li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
			<li><a href="#">The standard chunk of Lorem Ipsum used since </a></li>
			<li><a href="#">Duis a augue ac libero euismod viverra sit </a></li>
	    </ul>
	</nav>
	</div>
	<div class="box1">
		<h4 class="btm">Get in touch</h4>
		<div class="box1_address">
			<p>500 Lorem Ipsum Dolor Sit,</p>
			<p>22-56-2-9 Sit Amet, Lorem,</p>
			<p>USA</p>
			<p>Phone:(00) 222 666 444</p>
			<p>Fax: (000) 000 00 00 0</p>
			<p>Email: <a href="mailto:info@gmail.com">info[at]mycompany.com</a></p>
				   		<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>

		</div>
	</div>
	<div class="clear"></div>			
</div>
</div>
</div>
<!--footer1-->
<div class="ftr-bg">
	<div class="wrap">
		<div class="footer">
		<div class="copy">
			<p class="w3-link">© 2013 Public-Library. All Rights Reserved | Design by&nbsp; <a href="http://w3layouts.com/"> W3Layouts</a></p>
		</div>
		<div class="clear"></div>	
	</div>
	</div>
</div>
</body>
</html>