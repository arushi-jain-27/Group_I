<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
	<!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Exact login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->

	<!-- Custom Theme files -->
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom Theme files -->
	
	<!-- web font --> 
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //web font --> 
	
</head>
<body>
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
			    <li class='active'><a href='index.html'><span>Home</span></a></li>
			    <li><a href='Advanced1.html'><span>Filter Search</span></a></li>
			    <li><a href='Advanced2.html'><span>Advanced Search</span></a></li>
			    <li class='has-sub'><a href='Login.html'><span>Login</span></a></li>
			    <li class='last'><a href='SignUp.html'><span>Sign Up</span></a></li>
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
	<div class="main">
		<h1>Add a New Text</h1>
		<div class="main-w3lsrow">
			<div class="login-form login-form-left"> 
				<div class="agile-row">					
					<div class="clear"></div>
					<div class="login-agileits-top"> 	
						<form action="/addrec" method="post" enctype="multipart/form-data"> 
						{{csrf_field()}}
							 <input type="text" class="form-control" id="accession_no" placeholder="accession_no" name="accession_no" required>
							<input type="text" class="form-control" id="title" placeholder="title" name="title" required>
							<input type="text" class="form-control" id="author" placeholder="author" name="author" required>
							
							    <input type="text" class="form-control" id="publisher" placeholder="publisher" name="publisher" required>
						   <input type="text" class="form-control" id="genre" placeholder="genre" name="genre">
							<input type="text" class="form-control" id="language" placeholder="language" name="language" >
							<input type="text" class="form-control" id="place" placeholder="place" name="place" >
							 <input type="text" id="keywords" class="form-control" placeholder="keywords" name="keywords" required>
							 <input type="text" id="description" class="form-control" placeholder="description" name="description">
							 <input type="text" class="form-control" id="year" placeholder="year" name="year" >
							 <label for="file">Select file to upload</label>
							<input type="file" class="form-control" id="file" placeholder="File" name="file" >
							<input type="submit" value="Add"> 
						</form> 	
					</div> 
					

				</div>  
			</div>  
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
	<h4 class="btm">IIT INDORE</h4>
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