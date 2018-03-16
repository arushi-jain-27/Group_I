<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>List of Results</title>
  <h1 align="center"> Advanced Search Results </h1>
  
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

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<?php

						
						foreach($results as $results)	{
						
							
							$sql=DB::select ("select books.accession_no as n, books.title as t, author.name as a, publisher.name as p, genre.name as g, language.name as l, books.description as d from books, author, book_author, publisher, book_publisher, genre, book_genre, language, book_language where books.book_id=$results->book_id and books.book_id=book_author.book_id and author.author_id=book_author.author_id and books.book_id=book_publisher.book_id and publisher.publisher_id=book_publisher.publisher_id and books.book_id=book_genre.book_id and genre.genre_id=book_genre.genre_id and books.book_id=book_language.book_id and language.language_id=book_language.language_id");
							$t=$sql[0]->t;
							$a=$sql[0]->a;
							$p=$sql[0]->p;
							$g=$sql[0]->g;
							$n=$sql[0]->n;
							$d=$sql[0]->d;
							$l=$sql[0]->l;
							echo "<a><div class='wrapper'>
<div class='post-list'>  
<section class='post-item'>
		<header >
            <h2 class='post-item-title'>Accession No. : </h2> $n
        </header>
        <header >
            <h2 class='post-item-title'>Title : </h2> $t
        </header>
       <header >
            <h2 class='post-item-title'>Author : </h2>$a
        </header>
        <header >
            <h2 class='post-item-title'>Genre : </h2>$p
        </header>
        <header >
            <h2 class='post-item-title'>Publisher : </h2>$g
        </header>
		<header >
            <h2 class='post-item-title'>Language : </h2> $l
        </header>
		<header >
            <h2 class='post-item-title'>Description : </h2> $d
        </header>
    </section>
</div>
</div>
</a>";
						      				 
					 }			 
       				
?>
</body>
</html>