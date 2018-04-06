<!DOCTYPE HTML>
<html>
<head>
<style>
.slider{
	position:relative;
}
.theme-default .nivoSlider {
	position:relative;
	background:#fff url(../images/loading.gif) no-repeat 50% 50%; 
}
.theme-default .nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	display:none;
}
.theme-default .nivoSlider a {
	border:0;
	display:block;
}
.theme-default .nivo-controlNav {
	text-align: center;
    padding-top:10px;
}
.theme-default .nivo-controlNav a {
	display:inline-block;
	width:15px;
	height:15px;
	background:#999999;
	border-radius:2em;
	text-indent:-9999px;
	border:0;
	margin:0 4px;
}
.theme-default .nivo-controlNav a.active,.theme-default .nivo-controlNav a:hover{
	background:#e1184a;
}
.theme-default .nivo-directionNav a {
	display:block;
	width:40px;
	height:40px;
	background:url(../images/l-r-arrows.png) no-repeat;
	text-indent:-9999px;
	border:0;
	opacity: 0;
	-webkit-transition: all 200ms ease-in-out;
    -moz-transition: all 200ms ease-in-out;
    -o-transition: all 200ms ease-in-out;
    transition: all 200ms ease-in-out;
}
.theme-default:hover .nivo-directionNav a { opacity: 1; }
.theme-default a.nivo-nextNav {
	background-position:0px 0;
	right:15px;
}
.theme-default a.nivo-prevNav {
	left:15px;
	background-position:-40px 0;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled {
	width: 100%;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled a {
	width: auto;
	height: auto;
	background: none;
	margin-bottom: 5px;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled img {
	display: block;
	width: 120px;
	height: auto;
}
/* The Nivo Slider styles */
.nivoSlider {
	position:relative;
	width:100%;
	height:auto;
	overflow: hidden;
}
.nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	max-width: none;
}
.nivo-main-image {
	display: block !important;
	position: relative !important; 
	width: 100% !important;
}

/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	border:0;
	padding:0;
	margin:0;
	z-index:6;
	display:none;
	background:white; 
	filter:alpha(opacity=0); 
	opacity:0;
}
/* The slices and boxes in the Slider */
.nivo-slice {
	display:block;
	position:absolute;
	z-index:5;
	height:100%;
	top:0;
}
.nivo-box {
	display:block;
	position:absolute;
	z-index:5;
	overflow:hidden;
}
.nivo-box img { display:block; }
.nivo-html-caption {
    display:none;
}
/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {
	position:absolute;
	top:45%;
	z-index:9;
	cursor:pointer;
}
.nivo-prevNav {
	left:0px;
	background:url(../images/prev.png) no-repeat;
}
.nivo-nextNav {
	right:0px;
}
/* Control nav styles (e.g. 1,2,3...) */
.nivo-controlNav {
	position: absolute;
	bottom:25px;
	right: 44px;
	z-index: 9;	
}
.nivo-controlNav a {
	cursor:pointer;
}
.nivo-controlNav a.active {
	font-weight:bold;
}
@media all and (max-width:320px) {
	.nivo-controlNav {
		bottom:5px;
	}
}
/*
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
*/
/* reset */
html,body,div,divi,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
ol,ul{list-style:none;margin:0;padding:0;}
blockquote,q{quotes:none;}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
table{border-collapse:collapse;border-spacing:0;}
/* start editing from here */
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{	vertical-align:baseline;}/* vertical align baseline */
.vertical-top{	vertical-align:top;}/* vertical align top */
.underline{	padding-bottom:5px;	border-bottom: 1px solid #eee; margin:0 0 20px 0;}/* Add 5px bottom padding and a underline */
nav.vertical ul li{	display:block;}/* vertical menu */
nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
img{max-width:100%;}
.a:hover {
  background-color: #ddd;
}
.post-item {
  padding: 0px 0px;
  margin: 1px 0;
  border-left: 1px solid #EEE;
}
.post-item:hover {
  background-color: #ddd;
}

.post-item-title {
  font-size: 1em;
  color: #222;
  line-height=1;
  display: inline-block;
  font-weight: bold;
  font-family:Arial, Geneva,Helvetica, sans-serif
}
/*end reset*/
divi {
	border-bottom-style: solid;
    border-bottom-width: thin;
}
body {
	background-color: #f6f6f6;
	font-family: Arial, Geneva,Helvetica, sans-serif;
	font-size: 100%;
}
.wrap{
	margin:0 auto;
	width:80%;
}
.btm_border{
	border-bottom: 4px solid  rgba(12, 12, 12, 0.1);
}
.h_bg{
	background-color: #f6f6f6;
	border-bottom: 6px solid #FC2B5F;	
}
.header{
	padding:2% 4%;
}
.logo{
	float: left;
}
/*h_btm*/
.h_btm{
	padding: 0 4%;
}
/*menu*/
.cssmenu {
	float: left;
}
.cssmenu > ul > li {
	display:inline-block;
	position: relative;
}
.cssmenu > ul > li.active a{
	color:#ffffff;
	background-color: #e1184a;
	background-image: -moz-linear-gradient(top, #cf0c3c, #fc2b5f);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#cf0c3c), to(#fc2b5f));
	background-image: -webkit-linear-gradient(top, #cf0c3c, #fc2b5f);
	background-image: -o-linear-gradient(top, #cf0c3c, #fc2b5f);
	background-image: linear-gradient(to bottom, #cf0c3c, #fc2b5f);
	background-repeat: repeat-x;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffcf0c3c', endColorstr='#fffc2b5f', GradientType=0);
	border-color: #fc2b5f #fc2b5f #d70338;
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
}
.cssmenu > ul > li span img {
	vertical-align: middle;
}
.cssmenu > ul > li > a {
	font-family: 'Quattrocento Sans', sans-serif;
	color: #ffffff;
	display: block;
	font-size: 16px;
	line-height: 1.8em;
	padding: 12px 28px;
	background: rgba(12, 12, 12, 0.1);
	color: #555555;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	-webkit-border-top-left-radius: 10px;
	-webkit-border-top-right-radius: 10px;
	-moz-border-top-left-radius: 10px;
	-moz-border-top-right-radius: 10px;
	-o-border-top-left-radius: 10px;
	-o-border-top-right-radius: 10px;
}
.cssmenu > ul > li > a:hover {
	-webkit-transition: 0.9s;
	-moz-transition: 0.9s;
	-o-transition: 0.9s;
	transition: 0.9s;
	background: #999999;
	color: #ffffff;
}
/*Bookmark*/
#bookmark-this {
  padding: 5px 10px;
  background-color: #e1184a;
  border: 1px solid #000000;
  border-radius: 4px;
  font-size: 12px;
  color: #fff;
  text-decoration: none;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, .2);
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select:none;
  user-select:none;
}
#bookmark-this:active {
  background-color: #e1184a;
  border: 1px solid #000000;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
}

#bookmark-thiss {
  padding: 5px 10px;
  background-color: #e1184a;
  border: 1px solid #000000;
  border-radius: 4px;
  font-size: 12px;
  color: #000;
  text-decoration: none;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, .2);
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select:none;
  user-select:none;
}
#bookmark-thiss:active {
  background-color: #e1184a;
  border: 1px solid #000000;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
}
/*Bookmark*/
/*column*/
.col-container {
    display: table; /* Make the container element behave like a table */
    width: 100%; /* Set full-width to expand the whole page */
}

.col {
    display: table-cell; /* Make elements inside the container behave like table cells */
}
/*column*/
/*search*/
.search{
	float: right;
	width: 28%;
	border: 1px solid rgb(226, 226, 226);
	background: #FFFFFF;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	position: relative;
}
.search input[type="text"]{
	padding:8px 16px;
	outline: none;
	color: #202020;
	background:none;
	border: none;
	width: 78.33%;
	line-height: 1.5em;
}
.search input[type="submit"]{
	background: url('../images/search.png') no-repeat 2px 6px;
	padding: 4px 8px;
	border: none;
	cursor: pointer;
	width: 10.33%;
	line-height: 1.5em;
	position: absolute;
	right: 10px;
}
.search input[type="submit"]:hover {
	background:url('../images/search_h.png') no-repeat 2px 6px;
	-webkit-transition: .2s all linear;
	-moz-transition: .2s all linear;
	-o-transition: .2s all linear;
	transition: .2s all linear;
}
.search:hover{
	-webkit-transition: .2s all linear;
	-moz-transition: .2s all linear;
	-o-transition: .2s all linear;
	transition: .2s all linear;
	box-shadow: inset 0px -1px 4px #E4E4E4;
	-webkit-box-shadow: inset 0px -1px 4px #E4E4E4;
	-moz-box-shadow: inset 0px -1px 4px #E4E4E4;
	-o-box-shadow: inset 0px -1px 4px #E4E4E4;
}
.searchh{
	float: left;
	width: 60%;
	border: 1px solid rgb(226, 226, 226);
	background: #FFFFFF;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	position: relative;
}
.searchh input[type="text"]{
	padding:8px 16px;
	outline: none;
	color: #202020;
	background:none;
	border: none;
	width: 78.33%;
	line-height: 1.5em;
}
.searchh input[type="submit"]{
	background: url('../images/search.png') no-repeat 2px 6px;
	padding: 4px 8px;
	border: none;
	cursor: pointer;
	width: 10.33%;
	line-height: 1.5em;
	position: absolute;
	right: 10px;
}
.searchh input[type="submit"]:hover {
	background:url('../images/search_h.png') no-repeat 2px 6px;
	-webkit-transition: .2s all linear;
	-moz-transition: .2s all linear;
	-o-transition: .2s all linear;
	transition: .2s all linear;
}
.searchh:hover{
	-webkit-transition: .2s all linear;
	-moz-transition: .2s all linear;
	-o-transition: .2s all linear;
	transition: .2s all linear;
	box-shadow: inset 0px -1px 4px #E4E4E4;
	-webkit-box-shadow: inset 0px -1px 4px #E4E4E4;
	-moz-box-shadow: inset 0px -1px 4px #E4E4E4;
	-o-box-shadow: inset 0px -1px 4px #E4E4E4;
}
/*---start-services----*/
.services {
	display: block;
}
.services-header h3{
	color: #555555;
	font-family: 'Quattrocento Sans', sans-serif;
	font-size: 2em;
	font-weight: normal;
	letter-spacing: -1px;
	text-shadow: 0 1px 0 #ffffff;
	text-transform: uppercase;
}
/*main*/
.main_bg{
	background: #e8e8e8;
}
.main{
	padding: 4%;
}
.content h2{
	letter-spacing: -1px;
	text-transform: uppercase;
	font-size: 2em;
	color: #575757;
	font-family: 'Quattrocento Sans', sans-serif;
	text-shadow: 0 1px 0 white;
}
.content h3{
	font-size: 1.2em;
	color: #e1184a;
	font-family: 'Quattrocento Sans', sans-serif;
	text-shadow: 0 1px 0 white;
	line-height: 1.8em;
	margin: 0.8em 0;
	text-align
}
.content p{
	color: #575757;
	line-height: 1.8em;
	font-size: 0.8925em;
	
}
.content p a img{
	float: left;
	margin-right:4%;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-o-border-radius: 50%;
	padding: 6px;
	background: #D5D5D5;
}
/*footer*/
.footer-bg{
	background: #e8e8e8;
}
.footer{
	padding:4%;
}
.box1{
	float:right;
	width: 30.33%;
	margin-right: 4%;
}
.box1:nth-child(3){
	margin-right: 0;
}
.box1 h4{
	letter-spacing: -1px;
	text-transform: uppercase;
	font-size: 2em;
	color: #575757;
	font-family: 'Quattrocento Sans', sans-serif;
	text-shadow: 0 1px 0 white;
}
.btm{
	margin-bottom: 4%;
}
.box1 nav ul li img{
	margin-top: 10px;	
}
.box1 nav ul li{
	display: inline-block;
}
.box1 nav ul li a{
	color: #575757;
	line-height: 1.8em;
	font-size: 0.8925em;
}
.box1 nav ul li a:hover{
	text-decoration:none;
	color: #e1184a;
}
.box1 p{
	color: #575757;
	line-height: 1.8em;
	font-size: 0.8925em;
}
.box1_address p a{
	cursor: pointer;
	color: #e1184a;
}
.box1_address p a:hover{
	color: #575757;
}

/***** Media Quries *****/

@media only screen and (max-width: 1280px) {
	.wrap{
		width:95%;
	}
}
@media(max-width:1080px){
	
}
@media(max-width:1050px){
	
}
@media only screen and (max-width: 1024px) {
	.wrap{
		width:95%;
	}
	.images_1_of_3 h3 {
		font-size: 1.5em;
	}
	.gallery {
		width: 68%;
	}
}
@media(max-width:991px){
	
}
@media(max-width:900px){
	
}
@media only screen and (max-width: 800px) {
	.wrap{
		width:95%;
	}
	.cssmenu > ul > li > a {
		font-size: 16px;
		line-height: 1.8em;
		padding: 8px 12px;
	}
	.search input[type="submit"] {
		width: 14.33%;
	}
}
@media(max-width:768px){
	.images_1_of_3 {
		width: 100%;
	}
	.gallery {
		width: 100%;
	}
	.terminals {
		float: right;
		width: 100%;
	}	
	.box1 {
		width: 100%;
		margin: 0;
		padding: 0;
	}
	.special-grid {
		width: 100%;
	}
	.services-grid {
		width: 100%;
		margin: 0;
		padding: 0;
	}
	.contact_info {
		float: right;
		width: 100%;
	}
	.company_address {
		width: 100%;
	}
}
@media(max-width:667px){
	
}
@media only screen and (max-width: 640px){
	.wrap{
		width:95%;
	}
	.gallery {
		width:100%;
	}
	.terminals {
		float: left;
		width: 100%;
	}
	.logo {
		width: 30%;
	}
	.search input[type="text"] {
		width: 66.33%;
	}
	.search input[type="submit"] {
		width: 20.33%;
	}
}
@media(max-width:568px){
	.social-icons {
		padding: 1px;
	}
	.search {
		width: 23%;
	}
	.search input[type="text"] {
		padding: 11px 16px;
	}
}
@media only screen and (max-width: 480px) {
	.wrap{
		width:95%;
	}
	.logo{
		margin-top: 2%;
	}
	.search {
		width: 32%;
	}
	.search input[type="text"] {
		padding: 6px 6px;
	}
	.social-icons {
		float: right;
		padding: 0px;
		margin-top: 1%;
	}
	.images_1_of_3 {
		width: 99.333%;
	}
	.gallery {
		width: 100%;
		margin-right: 0%;
	}
	.terminals {
		float: none;
		width: 100%;
	}
	.box1 {
		float:none;
		width: 100%;
		margin-right: 0%;
	}
	.services-grid {
		width: 100%;
		margin-left: 0%;
		margin-right: 2%;
	}
	.company_address {
		float: none;
		margin-right: 0%;
		width: 100%;
	}
	.contact_info {
		float: none;
		width: 100%;
	}
	.cssmenu > ul > li > a {
		font-size: 13px;
		line-height: 1.5em;
		padding: 8px 6px;
	}
}
@media(max-width:414px){
	.search {
		width: 29%;
	}
	.h_btm {
		padding: 0 0%;
	}
}
@media(max-width:384px){
	.logo {
		width: 50%;
	}
	.social-icons {
		float: left;
		padding: 0px;
		margin-top: 1%;
	}
	.cssmenu > ul > li > a {
		font-size: 16px;
		padding: 8px 10px;
	}
	.search {
		width: 100%;
		margin:10px 0;
	}
	.search input[type="submit"] {
		width: 10%;
		margin: 0;
	}
}
@media(max-width:375px){
	.cssmenu > ul > li > a {
		font-size: 15px;
		padding: 8px 9px;
	}
}
@media only screen and (max-width: 320px) {
	.wrap{
		width:95%;
	}
	.logo{
		float: none;
		width: 100%;
		text-align:center;
	}
	.services-grid {
		width: 100%;
		margin-left: 0%;
		margin-right: 0%;
	}
	.special-grid {
		float: none;
		width: 100%;
		margin-right: 0%;
	}
	.cssmenu > ul > li > a {
		font-size: 11px;
		padding: 8px 11px;
	}
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
						<h3 align="center">TRANSLATIONS</h3>
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
use Illuminate\Support\Facades\DB;
use App\User;

foreach ($results as $results){

/*$t_id1=DB::SELECT("
                select translations_id
                from book_translations
                where book_id=$book_id ; 
    ");
	$t_id=$t_id1[0]->translations_id;*/
$t_id=$results->id;
  
$a=DB::SELECT("
               select translator
                from translations
                where translations_id=$t_id ;  
    ");
  if(!empty($a[0]->translator))
    $a1=$a[0]->translator;
  else
    $a1='';
  //echo $book_id1;
   $g=DB::SELECT("
                select name
                from translations
                where translations_id=$t_id ; 
    ");
  if(!empty($g[0]->name))
    $g1=$g[0]->name;
  else
    $g1=''; 
  $c=DB::SELECT("
                select keywords
                from translations
                where translations_id=$t_id ; 
    ");
  if(!empty($c[0]->keywords))
    $c1=$c[0]->keywords;
  else
    $c1='';  
  $d=DB::SELECT("
                select description
                from translations
                where translations_id=$t_id ; 
    ");
  if(!empty($d[0]->description))
    $d1=$d[0]->description;
  else
    $d1='';  
  $f=DB::SELECT("
               select year
                from translations
                where translations_id=$t_id ;  
    ");
  if(!empty($f[0]->year))
    $f1=$f[0]->year;
  else
    $f1='';  
  $b=DB::SELECT("
                select publisher.name
                from translations_publisher,publisher
                where translations_publisher.translations_id=$t_id and translations_publisher.publisher_id=publisher.publisher_id; 
    ");
  if(!empty($b[0]->name))
    $b1=$b[0]->name;
  else
    $b1='';   
  $e=DB::SELECT("
                select language.name
                from language,translations_language
                where translations_language.translations_id=$t_id and translations_language.language_id=language.language_id; 
    ");
  if(!empty($e[0]->name))
    $e1=$e[0]->name;
  else
    $e1='';
	  
echo "<a>      
<div class='wrapper'>
<div class='post-list'>  
<section class='post-item'>
        <header >
            <h2 class='post-item-title'>Translation Language : </h2> $e1
        </header>
        <header >
            <h2 class='post-item-title'>Title : </h2>$g1
        </header>
        <header >
            <h2 class='post-item-title'>Translator : </h2>$a1
        </header>
        <header >
            <h2 class='post-item-title'>Publisher : </h2>$b1
        </header>
        <header >
            <h2 class='post-item-title'>Keywords : </h2>$c1
        </header>
        
        <header >
            <h2 class='post-item-title'>Description : </h2>$d1
        </header>
        <header >
            <h2 class='post-item-title'>Year Published : </h2>$f1
        </header>
    </section>
</div>
</div></a>";
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