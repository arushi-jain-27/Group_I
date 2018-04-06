<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 8px 2px;
    -webkit-transition-duration: 2s; /* Safari */
    transition-duration: 2s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button1:hover {
    background-color: #f44336;
    color: white;
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
  margin: 20px 0;
  border-left: 1px solid #EEE;
}
.post-item:hover {
  background-color: #ddd;
  -webkit-transition-duration: 1s; /* Safari */
    transition-duration: 1s;
}

.post-item-title {
  font-size: 5.50em;
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
			    <li><a href='/adv2'><span>Advanced Search </span></a></li>
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
<!-- Slider_bg -->
<br />
<div class="services">
          <div class="services-header">
            <h3 align="center">Trending</h3>
            <div class="clear"> </div>
          </div>
      
<div class="col-container">

  <div class="col" >
  <div class='h_btm'>
  <div>
      <form>
        
        <center><button class="button button1" ><a href='http://127.0.0.1:8000/trending' >Trending </a> </button></center>
        <br />
        <center><button class="button button1" ><a href='http://127.0.0.1:8000/addrecord' >Add New Texts</a></button></center>
      </form>
  </div>
  <div class="clear"></div>
  
  </div>
  </div>  
  
<?php   

foreach ($results as $results) {
  //echo "$results->id";
  $user=auth()->id();
  $a=DB::SELECT("
                select book.title
                from book,relations
                where book.book_id=relations.book_id and relations.id=$results->id ; 
    ");
  if(!empty($a[0]->title))
    $a1=$a[0]->title;
  else
    $a1='';
 $pl=DB::SELECT("
                select book.place
                from book,relations
                where book.book_id=relations.book_id and relations.id=$results->id ; 
    ");
  if(!empty($pl[0]->title))
    $pl1=$pl[0]->title;
  else
    $pl1='';
$y=DB::SELECT("
                select book.year
                from book,relations
                where book.book_id=relations.book_id and relations.id=$results->id ; 
    ");
  if(!empty($y[0]->title))
    $y1=$pl[0]->title;
  else
    $y1='';
  //echo $a;
  $c=DB::SELECT("
                select author.name
                from author,relations
                where author.author_id=relations.author_id and relations.id=$results->id; 
    ");
  if(!empty($c[0]->name))
    $c1=$c[0]->name;
  else
    $c1='';
  $d=DB::SELECT("
                select genre.name
                from genre,relations
                where genre.genre_id=relations.genre_id and relations.id=$results->id; 
    ");
  if(!empty($d[0]->name))
    $d1=$d[0]->name;
  else
    $d1='';
  $f=DB::SELECT("
                select publisher.name
                from publisher,relations
                where publisher.publisher_id=relations.publisher_id and relations.id=$results->id; 
    ");
  if(!empty($f[0]->name))
    $f1=$f[0]->name;
  else
    $f1='';
  //$bookmark='Remove Bookmark';
  echo "<div class='wrapper' >
  <div class='post-list'>  
<section class='post-item'>
    
        <header >
          <a href='http://127.0.0.1:8000/search2/$results->id/$user' >  <h1 style='color:#FF3383' class='post-item-title'>$a1</h1></a>
        </header>
       
    $c1.",". $a1.",".$pl1.",".$f1.",".$y1<br />

    <button type='button' class='btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-bookmark'></span> 
        </button>
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
  </div>
  </div>
</div>
</body>
</html>