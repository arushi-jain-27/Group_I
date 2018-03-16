<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>List of Posts</title>
  
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
.abc{
  font-size: 175%;
  color: #6495ED;
  padding: 2px 8px;
  
  margin-top: 1em;
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,400italic|Crimson+Text:400,600' type='text/css' rel='stylesheet' />
  <center class='abc'>The Result is :</center>
<?php   
foreach($results as $results) {
echo "<a>      
<div class='wrapper'>
<div class='post-list'>  
<section class='post-item'>
        <header >
            <h2 class='post-item-title'>Title : </h2> $results->b
        </header>
        <header >
            <h2 class='post-item-title'>Translation : </h2>$results->a
        </header>
        <header >
            <h2 class='post-item-title'>Author : </h2>$results->i
        </header>
        <header >
            <h2 class='post-item-title'>Genre : </h2>$results->c
        </header>
        <header >
            <h2 class='post-item-title'>Language : </h2>$results->d
        </header>
        <header >
            <h2 class='post-item-title'>Publisher : </h2>$results->e
        </header>
        <header >
            <h2 class='post-item-title'>Keywords : </h2>$results->g
        </header>
        <header >
            <h2 class='post-item-title'>Keywords(Translation) : </h2>$results->h
        </header>
        <header >
            <h2 class='post-item-title'>Description : </h2>$results->j
        </header>
        <header >
            <h2 class='post-item-title'>Description(Translation) : </h2>$results->f
        </header>
    </section>
</div>
</div></a>";
}
?>
</body>

</html>
