<?php
use App\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
Route::get('/adv1', function () {
    return view('advsearch1');
});
Route::get('/upload','uploadCantroller@index');
Route::post('/store','uploadCantroller@store');
Route::get('/show','uploadCantroller@show');
Route::get('/search',function(){
	//return view('search');
	$count=0;
	
	$title_name=request('title');
	$auth_name=request('author');
	$genre_name=request('genre');
	$trans_name=request('translation');
	$pub_name=request('publisher');
	$lang_name=request('language');
	
	$sql="SELECT distinct book.book_id, book.title from book, book_author,author, book_publisher, publisher, book_genre, genre, book_language, language, book_translations, translations ";
				  if ($title_name!="")
				  {
					  $sql=$sql."where book.title like CONCAT('%', '$title_name', '%')";
					  $count=1;
				  }
				  if ($auth_name!="")
				  {
					  if ($count==0){
					  $sql=$sql."where author.name='$auth_name' and author.author_id=book_author.author_id and book.book_id=book_author.book_id";
					  $count=1;
					  }
					  else
					  $sql=$sql." and author.name='$auth_name' and author.author_id=book_author.author_id and book.book_id=book_author.book_id";
				  }
				  else
				  {
					  $search= ", book_author,author";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($trans_name!="")
				  {
					  if ($count==0){
					  $sql=$sql."where translations.name='$trans_name' and translations.translations_id=book_translations.translations_id and book.book_id=book_translations.book_id";
					  $count=1;
					  }
					  else
					  $sql=$sql." and translations.name='$trans_name' and translations.translations_id=book_translations.translations_id and book.book_id=book_translations.book_id";
				  }
				  else
				  {
					  $search= ", book_translations, translations";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($pub_name!="")
				  {
					 if ($count==0)
					  {
						$sql=$sql."where publisher.name ='$pub_name' and publisher.publisher_id=book_publisher.publisher_id and book.book_id=book_publisher.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and publisher.name='$pub_name' and publisher.publisher_id=book_publisher.publisher_id and book.book_id=book_publisher.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_publisher, publisher";
					  $sql= str_replace($search, "", $sql);
				  }
				   if ($lang_name!="")
				  {
					  if ($count==0)
					  {
						$sql=$sql."where language.name ='$lang_name' and language.language_id=book_language.language_id and book.book_id=book_language.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and language.name ='$lang_name' and language.language_id=book_language.language_id and book.book_id=book_language.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_language, language";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($genre_name!="")
				  {
					  if ($count==0)
					  {
						$sql=$sql."where genre.name ='$genre_name' and genre.genre_id=book_genre.genre_id and book.book_id=book_genre.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and genre.name ='$genre_name' and genre.genre_id=book_genre.genre_id and book.book_id=book_genre.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_genre, genre";
					  $sql= str_replace($search, "", $sql);
				  }
	//echo $sql;
	
	$results=DB::select ($sql);

//	return $results;


	return view('results',compact('results'));
	});

Route::get('/addrecord', function () {
    return view('addrec');
});
Route::post('/addrec',function(){
	$title=request('title');
	$author=request('author');
	$genre=request('genre');	
	$publisher=request('publisher');
	$language=request('language');
	$accession_no=request('accession_no');
	$year=request('year');
	$keywords=request('keywords');
	$description=request('description');
	$place=request('place');
	// New
	// Old
	$check=DB::select('select * from book,temp_book where book.accession_no like ? or temp_book.accession_no like ?' , [$accession_no, $accession_no ]);	
	if(!empty(($check)))
	{
		return redirect()->back();
	}
	DB::insert('INSERT INTO temp_book(Title, accession_no, Place, author, publisher, genre, language, year, keywords, description) VALUES (?,?,?,?,?,?,?,?,?,?)', [$title, $accession_no, $place , $author ,$publisher , $genre , $language , $year , $keywords , $description ]);

	$file = Input::file('img');
	$filename = time(). '-' . $file->getClientOriginalName();
	$file = $file->store('public');
	DB::insert('INSERT INTO file(name,id) values (?,?)',[$filename,$accession_no]);
	return $filename;
    
    	
    	return redirect()->back();	

});



Route::get('/admin', function () {
	$results=DB::select("SELECT `Title` as t, `accession_no` as n, `Place`, `author` as a, `publisher` as p, `genre` as g, `language` as l, `year` as y, `keywords` as k, `description` as d FROM `temp_book` WHERE 1");
    return view('admin',	compact('results'));
});
Route::get('/admin/{results}', function ($id) {
	$results=DB::select('SELECT Title as t, accession_no as n, Place, author as a, publisher as p, genre as g, language as l, year as y, keywords as k, description as d FROM temp_book WHERE accession_no=?', [$id]);
	return view('check', compact('results'));
});







Route::post('/add',function(){




	if(request('m')=='i'){

	$results=DB::select('SELECT Title as t, accession_no as n, Place, author as a, publisher as p, genre as g, language as l, year as y, keywords as k, description as d FROM temp_book WHERE accession_no=?', [ request('ide') ]);	
	$title=$results[0]->t;
	$author=$results[0]->a;
	$genre=$results[0]->g;	
	$publisher=$results[0]->p;
	$language=$results[0]->l;
	$accession_no=$results[0]->n;
	$year=$results[0]->y;
	$keywords=$results[0]->k;
	$description=$results[0]->p;
	$place=$results[0]->Place;
	// New
	$file=request('file');
	// Old
	DB::insert('insert into book (accession_no, title, keywords, description, year, place) values (?,?,?,?,?,?)', [$accession_no, $title, $keywords, $description,$year,$place]);
	$b_id=DB::select("select max(book_id) as luck from book");
	//return ;
	$b_id=$b_id[0]->luck;
	if ( empty($a_id)){
		DB::insert('insert into author (name,number_of_books) values (?,?)' , [$author,1]);
		$a_id=DB::select ("select max(author_id) as luck from author");
		$a_id=$a_id[0]->luck;
		}
	else
	{
		$a_id=$a_id[0]->author_id;
		DB::update("update author set number_of_books=number_of_books+1 where author_id=$a_id ");
	}
	    DB::select('insert into book_author values (?,?)' , [$a_id,$b_id]);
	    
	
	$p_id=DB::select("select publisher_id from publisher where name like CONCAT('%', '$publisher', '%')");
	
	if ( empty($p_id)){
		DB::insert('insert into publisher (name,number_of_books) values (?,?)' , [$publisher,1]);
		$p_id=DB::select ("select max(publisher_id) as luck from publisher");
		$p_id=$p_id[0]->luck;
		}
	else
		{
			$p_id=$p_id[0]->publisher_id;
			DB::update("update publisher set number_of_books=number_of_books+1 where publisher_id=$p_id ");
		}
	    DB::insert('insert into book_publisher values (?,?)', [$p_id,$b_id]);
	
	$g_id=DB::select("select genre_id from genre where name like CONCAT('%', '$genre', '%')");
	
	if ( empty($g_id)){
		DB::insert('insert into genre (name,number_of_books) values (?,?)' , [$genre,1]);
		$g_id=DB::select ("select max(genre_id) as luck from genre");
		$g_id=$g_id[0]->luck;
		}
	else
		{
			$g_id=$g_id[0]->genre_id;
			DB::update("update genre set number_of_books=number_of_books+1 where genre_id=$g_id ");
		}
	DB::insert('insert into book_genre values (?,?)' , [$g_id,$b_id]);
	$l_id=DB::select("select language_id from language where name like CONCAT('%', '$language', '%')");
	if ( empty($l_id)){
		DB::insert('insert into language (name,number_of_books) values (?,?)' , [$language,1]);
		$l_id=DB::select ("select max(language_id) as luck from language");
		$l_id=$l_id[0]->luck;
		}
	else
		{
			$l_id=$l_id[0]->language_id;
			DB::update("update language set number_of_books=number_of_books+1 where language_id=$l_id ");
		}
	DB::insert('insert into book_language values (?,?)' , [$l_id,$b_id]);
	DB::insert('insert into relations (book_id, author_id,genre_id,publisher_id,language_id) values (?,?,?,?,?)' , [$b_id,$a_id, $g_id, $p_id, $l_id]);
    }
	     DB::delete('delete  from temp_book WHERE accession_no=?', [ request('ide') ]); 
		 return redirect('admin');
});
Route::get ('/addcomment', function(){
	$user_id=request ('user_id');
	$book_id=request ('book_id');
	$comment=request ('comment');
	$id1=DB::select ('select id from relations where book_id=?', array ($book_id));
	$id=$id1[0]->id;
	if (!empty($user_id))
		DB::insert('insert into comment (book_id,comment, user_id, created_at) values (?,?,?,?)' , [$book_id,$comment,$user_id, new DateTime()]);
	else
		echo "Please log in to add a comment....";
	return view('display',compact('id'));
});
Route::get('/adv2', function () { return view('try');});
Route::get('/search1', function(){
	$name = request('name');
	$mytext = request('mytext');
	$place = request('place');
	$count=0;
	
/*foreach( $name as $key => $n ) {
  print "The name is ".$n." and email is ".$email[$key].", thank you\n";
}*/

$select="SELECT distinct book.book_id, book.title from book ";
$where="where ";
foreach ($mytext as $key=>$text)
{
	if ($count==0)
	{
		if ($place[$key]=='publisher' or $place[$key]=='genre' or $place[$key]=='language' or $place[$key]=='author'or $place[$key]=='translations' ){
			if (strpos($select, $place[$key]) !== false)
				$where=$where."$place[$key].name like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
			else 
			{
				$select=$select.", $place[$key], book_$place[$key] ";
				$where=$where."$place[$key].name like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
			}
			}
		else
			$where=$where."book.$place[$key] like CONCAT('%', '$text', '%') ";
		$count++;
	}
	else
	{
		
		if ($place[$key]=='genre' ||$place[$key]=='publisher' ||$place[$key]=='language' ||$place[$key]=='author'||$place[$key]=='translations' ){
			if (strpos($select, $place[$key]) !== false)
				if ($name[$key]=='AND' ||$name[$key]=='OR')
					$where=$where."$name[$key] $place[$key].name like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
				else
					$where=$where."and $place[$key].name not like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
			else
			{
				
				$select=$select.", $place[$key], book_$place[$key] ";
				if ($name[$key]=='AND' or $name[$key]=='OR')
					$where=$where."$name[$key] $place[$key].name like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
				else
					$where=$where."and $place[$key].name not like CONCAT('%', '$text', '%') and $place[$key].$place[$key]_id=book_$place[$key].$place[$key]_id and book.book_id=book_$place[$key].book_id ";
			}
				
			}
		else
		{
			if ($name[$key]=='AND' or $name[$key]=='OR')
				$where=$where."$name[$key] book.$place[$key] like CONCAT('%', '$text', '%') ";
			else
				$where=$where."and book.$place[$key] not like CONCAT('%', '$text', '%') ";
		}
	}
}
$sql=$select.$where;

//echo $sql;
$results=DB::select ($sql);

	return view('results',compact('results'));
});
Route::get('/register','registrationController@create');
Route::post('/register','registrationController@store');
Route::get('/login','sessionsController@create');
Route::post('/login','sessionsController@store');
Route::get('/logout','sessionsController@destroy');
// Nikhil's code

Route::get('/', function () {
	
    return view('cs258/index');
});


Route::get('/basic', function() {
	// search
	$search=request('search');
	//$user_id=request('user_id');
	$search="%".$search."%";
	$send=$search;
	$results = DB::select("
		update relations
		set c=0;
			");
	
	$words = explode(" ", $search);
	//$l=sizeof($words);
	//dd($l);
	foreach ($words as $search) {
		//echo "$search aaaa";
		$l=strlen($search);
		if($search[0]!=$search[$l-1] && $search[0]=='%'){
			$search="".$search."%";
		}
		elseif ($search[0]!=$search[$l-1] &&  $search[$l-1]=='%') {
			$search="%".$search."";	
		}
		else if($search[0]!=$search[$l-1])			
			$search="%".$search."%";
		//echo "$search<br />";
		DB::select("
			UPDATE relations AS t1 INNER JOIN book AS t2 ON t1.book_id=t2.book_id 
			SET t1.c = t2.c+t1.c 
			where t1.book_id in (SELECT book_id from book where title like CONCAT('%', '$search', '%') or keywords like CONCAT('%', '$search', '%') or description like CONCAT('%', '$search', '%') )");
		DB::select("
			UPDATE relations AS t1 INNER JOIN genre AS t2 ON t1.genre_id=t2.genre_id 
			SET t1.c = t2.c+t1.c 
			where t1.genre_id in (SELECT genre_id from genre where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN author AS t2 ON t1.author_id=t2.author_id 
			SET t1.c = t2.c+t1.c 
			where t1.author_id in (SELECT author_id from author where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN language AS t2 ON t1.language_id=t2.language_id 
			SET t1.c = t2.c+t1.c 
			where  t1.language_id in (SELECT language_id from language  where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN publisher AS t2 ON t1.publisher_id=t2.publisher_id 
			SET t1.c = t2.c+t1.c 
			where  t1.publisher_id in (SELECT publisher_id from publisher  where name like ? )	
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN translations AS t2 ON t1.translations_id=t2.translations_id 
			SET t1.c = t2.c+t1.c 
			where t1.translations_id in (SELECT translations_id from translations where name like ? or keywords like ? or keywords like ? or translator like ? or year like ?)
			", array($search,$search,$search,$search,$search));
	}
	$results= DB::select("	
		select relations.id
		from relations
		where relations.c>0
		order by relations.c desc
			");

	if(empty($results)){
		 echo "Not Found";
		 echo "<a href='http://127.0.0.1:8000' > <br />home page <a>  "; 
	}
	return view('search2',compact('results','send'));
});


Route::get('/searchde/{results}', function ($id) {
	//link from search 
	$search=$id;
	$l=strlen($search);
	if($search[0]!='%' && $search[$l-1]!='%'){
		$search="%".$search."%";
	}
	$send=$search;
	$results = DB::select("
		update relations
		set c=0;
			");
	
	$words = explode(" ", $search);
	//$l=sizeof($words);
	//dd($l);
	foreach ($words as $search) {
		//echo "$search aaaa";
		$l=strlen($search);
		if($search[0]!=$search[$l-1] && $search[0]=='%'){
			$search="".$search."%";
		}
		elseif ($search[0]!=$search[$l-1] &&  $search[$l-1]=='%') {
			$search="%".$search."";	
		}
		else if($search[0]!=$search[$l-1])			
			$search="%".$search."%";
		//echo "$search<br />";
		DB::select("
			UPDATE relations AS t1 INNER JOIN book AS t2 ON t1.book_id=t2.book_id 
			SET t1.c = t2.c+t1.c 
			where t1.book_id in (SELECT book_id from book where title like CONCAT('%', '$search', '%') or keywords like CONCAT('%', '$search', '%') or description like CONCAT('%', '$search', '%') or year like ?)");
		DB::select("
			UPDATE relations AS t1 INNER JOIN genre AS t2 ON t1.genre_id=t2.genre_id 
			SET t1.c = t2.c+t1.c 
			where t1.genre_id in (SELECT genre_id from genre where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN author AS t2 ON t1.author_id=t2.author_id 
			SET t1.c = t2.c+t1.c 
			where t1.author_id in (SELECT author_id from author where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN language AS t2 ON t1.language_id=t2.language_id 
			SET t1.c = t2.c+t1.c 
			where  t1.language_id in (SELECT language_id from language  where name like ? )		
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN publisher AS t2 ON t1.publisher_id=t2.publisher_id 
			SET t1.c = t2.c+t1.c 
			where  t1.publisher_id in (SELECT publisher_id from publisher  where name like ? )	
			", array($search));
		DB::select("
			UPDATE relations AS t1 INNER JOIN translations AS t2 ON t1.translation_id=t2.translation_id 
			SET t1.c = t2.c+t1.c 
			where t1.translation_id in (SELECT translation_id from translations where name like ? or keywords like ? or keywords like ? or translator like ? or year like ?)
			", array($search,$search,$search,$search,$search));
	}
	$results= DB::select("	
		select relations.id
		from relations
		where relations.c>0
		order by relations.c desc
			");

	if(empty($results)){
		 echo "Not Found";
		 echo "<a href='http://127.0.0.1:8000' > <br />home page <a>  "; 
	}
	return view('search1',compact('results','send'));
});

Route::get('/search2/{results}', function ($id) {
	//link from search 
	DB::select(" UPDATE book        SET c = c+1 where book_id        in (select book_id from relations where $id=id )  ");
	DB::select(" UPDATE translations SET c = c+1 where translations_id in (select translations_id from relations where $id=id )");
	DB::select(" UPDATE author       SET c = c+1 where author_id      in (select author_id from relations where $id=id )");
	DB::select(" UPDATE genre        SET c = c+1 where genre_id       in (select genre_id from relations where $id=id )");
	DB::select(" UPDATE publisher    SET c = c+1 where publisher_id   in (select publisher_id from relations where $id=id  )");
	DB::select(" UPDATE language     SET c = c+1 where language_id    in (select language_id from relations where $id=id )");

	
    return view('display',compact('id'));
});



Route::get('/search3/{search}', function($search) {
	// search
	//$search=request('search');
	//$search=$search;
	$results = DB::select("
		update relations
		set c=0;
			");
	$send=$search;
	//echo "$search";
	$words = explode(" ", $search);
	//$l=sizeof($words);
	//dd($l);
	foreach ($words as $search) {
		//echo "$search ";
	$l=strlen($search);
	if($search[0]!=$search[$l-1] && $search[0]=='%'){
		$search="".$search."%";
	}
	elseif ($search[0]!=$search[$l-1] &&  $search[$l-1]=='%') {
		$search="%".$search."";	
	}
	else if($search[0]!=$search[$l-1])			
		$search="%".$search."%";
	//echo "$search<br />";
	$results = DB::select("
		UPDATE relations AS t1 
		SET t1.c = t1.c+1 
		where t1.book_id in (SELECT book_id from book where title like ? or keywords like ? or keywords like ? or year like ?)		
			", array($search,$search,$search,$search));
	$results = DB::select("
		UPDATE relations AS t1 INNER JOIN genre AS t2 ON t1.genre_id=t2.genre_id 
		SET t1.c = t1.c+1  
		where t1.genre_id in (SELECT genre_id from genre where name like ? )		
			", array($search));
	$results = DB::select("
		UPDATE relations AS t1 INNER JOIN author AS t2 ON t1.author_id=t2.author_id 
		SET t1.c = t1.c+1 
		where t1.author_id in (SELECT author_id from author where name like ? )		
			", array($search));
	$results = DB::select("
		UPDATE relations AS t1 INNER JOIN language AS t2 ON t1.language_id=t2.language_id 
		SET t1.c = t1.c+1  
		where  t1.language_id in (SELECT language_id from language  where name like ? )		
			", array($search));
	$results = DB::select("
		UPDATE relations AS t1 INNER JOIN publisher AS t2 ON t1.publisher_id=t2.publisher_id 
		SET t1.c = t1.c+1 
		where  t1.publisher_id in (SELECT publisher_id from publisher  where name like ? )		
			", array($search));
	$results = DB::select("
		UPDATE relations AS t1 INNER JOIN translations AS t2 ON t1.translations_id=t2.translations_id 
		SET t1.c = t1.c+1 
		where t1.translations_id in (SELECT translations_id from translations where name like ? or keywords like ? or keywords like ? or translator like ? or year like ?)
			", array($search,$search,$search,$search,$search));
	
	}
	$results= DB::select("	
		select relations.id
		from relations
		where relations.c>0
		order by relations.c desc
			");

	if(empty($results)){
		 echo "Not Found";
		 echo "<a href='http://127.0.0.1:8000' > <br />home page <a>  "; 
	}
	return view('search1',compact('results','send'));
});






Route::get('/recommendations', function() {
	DB::select("
		update relations
		set c=0;
			");
	DB::select("
		update relations
		set c=0;
			");
	DB::select("
		update relations,book
		set relations.c=book.c
		where relations.book_id=book.book_id;
			");
	DB::select("
		update relations,translations
		set relations.c=relations.c+translations.c
		where relations.translations_id=translations.translations_id;
			");
	DB::select("
		update relations,author
		set relations.c=relations.c+author.c
		where relations.author_id=author.author_id;
			");
	DB::select("
		update relations,genre
		set relations.c=relations.c+genre.c
		where relations.genre_id=genre.genre_id;
			");
	DB::select("
		update relations,publisher
		set relations.c=relations.c+publisher.c
		where relations.publisher_id=publisher.publisher_id;
			");
	DB::select("
		update relations,language
		set relations.c=relations.c+language.c
		where relations.language_id=language.language_id;
			");
	$results='';
	$id=auth()->id();
	//$id=2;
	if(!empty($id)){
		DB::select("
		update relations,bookmark
		set relations.c=-1
		where relations.book_id=bookmark.book_id and bookmark.user_id = ?;
			",array($id));
		DB::select("
		update relations,search_history
		set relations.c=-1
		where relations.book_id=search_history.book_id and search_history.user_id = ?;
			",array($id));
		$results1=DB::select("
			select distinct(relations.id)
			from relations
			where relations.id in(select relations.id
			from relations,book,bookmark,book_genre,book_publisher,
				 book_language,book_author
			where relations.c!=-1 
				  and (  (bookmark.book_id = book_genre.book_id 
				  		  and book_genre.genre_id = relations.genre_id)
				  	   or (bookmark.book_id = book_publisher.book_id 
				  		  and book_publisher.publisher_id = relations.publisher_id)	
				  	   or (bookmark.book_id = book_author.book_id 
				  		  and book_author.author_id = relations.author_id)	
				  	   or (bookmark.book_id = book_language.book_id 
				          and book_language.language_id = relations.language_id)
				      )    
				  and bookmark.user_id=?
			order by relations.c)
				",array($id));
		$results2=DB::select("
			select distinct(relations.id)
			from relations
			where relations.id in(select relations.id
			from relations,book,search_history,book_genre,book_publisher,
				 book_language,book_author
			where relations.c!=-1 
				  and (  (search_history.book_id = book_genre.book_id 
				  		  and book_genre.genre_id = relations.genre_id)
				  	   or (search_history.book_id = book_publisher.book_id 
				  		  and book_publisher.publisher_id = relations.publisher_id)	
				  	   or (search_history.book_id = book_author.book_id 
				  		  and book_author.author_id = relations.author_id)	
				  	   or (search_history.book_id = book_language.book_id 
				          and book_language.language_id = relations.language_id)
				      )    
				  and search_history.user_id=?
			order by relations.c)
				",array($id));
		/*if(!empty($results1[0]->id)){
			echo $results1[0]->id;
		}
		else{
			echo "dfghjkjhgfvbnmkjh";
		}
		if(!empty($results2[0]->id)){
			echo $results2[0]->id;
		}
		else{
			echo "wrkjwebkuvb";
		}*/
		return view('recommendations',compact('results1','results2'));
	}
	else{
		echo "<a href='/login'>Login to view Recommendations<a>";
	}		
});


