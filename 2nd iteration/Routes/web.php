
<?php
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
use Illuminate\Support\Facades\Auth;
$please= auth()->id();
Route::get('/adv1', function () {
	//dd (auth()->id());
    return view('advsearch1');
});
Route::get('/search',function(){
	//return view('search');
	//dd (auth()->id());
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
					  $sql=$sql."where author.name like CONCAT('%', '$auth_name', '%') and author.author_id=book_author.author_id and book.book_id=book_author.book_id";
					  $count=1;
					  }
					  else
					  $sql=$sql." and author.name like CONCAT('%', '$auth_name', '%') and author.author_id=book_author.author_id and book.book_id=book_author.book_id";
				  }
				  else
				  {
					  $search= ", book_author,author";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($trans_name!="")
				  {
					  if ($count==0){
					  $sql=$sql."where translations.name like CONCAT('%', '$trans_name', '%') and translations.translations_id=book_translations.translations_id and book.book_id=book_translations.book_id";
					  $count=1;
					  }
					  else
					  $sql=$sql." and translations.name like CONCAT('%', '$trans_name', '%') and translations.translations_id=book_translations.translations_id and book.book_id=book_translations.book_id";
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
						$sql=$sql."where publisher.name like CONCAT('%', '$pub_name', '%') and publisher.publisher_id=book_publisher.publisher_id and book.book_id=book_publisher.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and publisher.name like CONCAT('%', '$pub_name', '%') and publisher.publisher_id=book_publisher.publisher_id and book.book_id=book_publisher.book_id";
					  
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
						$sql=$sql."where language.name like CONCAT('%', '$lang_name', '%') and language.language_id=book_language.language_id and book.book_id=book_language.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and language.name like CONCAT('%', '$lang_name', '%') and language.language_id=book_language.language_id and book.book_id=book_language.book_id";
					  
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
						$sql=$sql."where genre.name like CONCAT('%', '$genre_name', '%') and genre.genre_id=book_genre.genre_id and book.book_id=book_genre.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and genre.name like CONCAT('%', '$genre_name', '%') and genre.genre_id=book_genre.genre_id and book.book_id=book_genre.book_id";
					  
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
	//$file=request('file');
	// Old
	$check=DB::select('select * from book,temp_book where book.accession_no like ? or temp_book.accession_no like ?' , [$accession_no, $accession_no ]);	
	if(!empty(($check)))
	{
		return redirect()->back();
	}
	//DB::insert('INSERT INTO temp_book(Title, accession_no, Place, author, publisher, genre, language, year, keywords, description) VALUES (?,?,?,?,?,?,?,?,?,?)', [$title, $accession_no, $place , $author ,$publisher , $genre , $language , $year , $keywords , $description ]);
	$file = Input::file('file');
	$filename='';
	//$filename = time(). '-' . $file->getClientOriginalName();
	//return $filename;
	//$file = $file->store('public');
	
	DB::insert('INSERT INTO temp_book(Title, accession_no, Place, author, publisher, genre, language, year, keywords, description, address) VALUES (?,?,?,?,?,?,?,?,?,?,?)', [$title, $accession_no, $place , $author ,$publisher , $genre , $language , $year , $keywords , $description,$filename ]);
		return redirect()->back();
});

Route::get('/deleterecord/{book_id1}', function($book_id)
	{
		$a1=DB::select("select author_id from book_author where book_id=? ",array($book_id));
		$p1=DB::select("select publisher_id from book_publisher where book_id=? ",array($book_id));
		$g1=DB::select("select genre_id from book_genre where book_id=? ",array($book_id));
		$l1=DB::select("select language_id from book_language where book_id=? ",array($book_id));
		$a=$a1[0]->author_id;
		$p=$p1[0]->publisher_id;
		$g=$g1[0]->genre_id;
		$l=$l1[0]->language_id;
		$t=DB::select("select translations_id from book_translations where book_id=? ",array($book_id));
		DB::delete("delete from book_author where book_id=? ", array($book_id));
		DB::delete("delete from book_publisher where book_id=? ", array($book_id));
		DB::delete("delete from book_genre where book_id=? ", array($book_id));
		DB::delete("delete from book_language where book_id=? ", array($book_id));
		
		DB::delete("delete from book_translations where book_id=? ", array($book_id));
		DB::delete("delete from bookmark where book_id=? ", array($book_id));
		DB::delete("delete from search_history where book_id=? ", array($book_id));
		//DB::delete("delete from translations where translations_id in (select translations_id from book_translations where book_id=?)? ", array($book_id));
		DB::delete("delete from book where book_id=?", array($book_id));
		DB::update ("update author set number_of_books=number_of_books-1 where author_id=?",array($a));
		$c=DB::select("select number_of_books as n from author where author_id=?", array($a));
		$c1=$c[0]->n;
		if ($c1==0)
			DB::delete ("delete from author where author_id=?",array($a));
		
		DB::update ("update publisher set number_of_books=number_of_books-1 where publisher_id=?",array($p));
		$c=DB::select("select number_of_books as n from publisher where publisher_id=?", array($p));
		$c1=$c[0]->n;
		if ($c1==0)
			DB::delete ("delete from publisher where publisher_id=?",array($p));
		
		DB::update ("update genre set number_of_books=number_of_books-1 where genre_id=?",array($g));
		$c=DB::select("select number_of_books as n from genre where genre_id=?", array($g));
		$c1=$c[0]->n;
		if ($c1==0)
			DB::delete ("delete from genre where genre_id=?",array($g));
		
		DB::update ("update language set number_of_books=number_of_books-1 where language_id=?",array($l));
		$c=DB::select("select number_of_books as n from language where language_id=?", array($l));
		$c1=$c[0]->n;
		if ($c1==0)
			DB::delete ("delete from language where language_id=?",array($l));
		return view ('cs258/index');
	}
);

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

	$results=DB::select('SELECT Title as t, accession_no as n, Place, author as a, publisher as p, genre as g, language as l, year as y, keywords as k, description as d, address as ad FROM temp_book WHERE accession_no=?', [ request('ide') ]);	
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
	$address=$results[0]->ad;
	
	
	DB::insert('insert into book (accession_no, title, keywords, description, year, place, address) values (?,?,?,?,?,?,?)', [$accession_no, $title, $keywords, $description,$year,$place,$address]);
	$b_id=DB::select("select max(book_id) as luck from book");

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
Route::get ('/viewbookmarks', function(){
	$user_id=auth()->id();
	if (empty($user_id))
		echo "Please sign in to view bookmarks.";
	else{
		$results=DB::select('select book_id from bookmark where user_id=?', array($user_id));
		return view ('bookmark',compact('results'));
	}
});
Route::get ('/viewhistory', function(){
	$user_id=auth()->id();
	if (empty($user_id))
		echo "Please sign in to view bookmarks.";
	else{
		$results=DB::select('select book_id, time from search_history where user_id=? order by time desc', array($user_id));
		return view ('viewhistory',compact('results'));
	}
});
Route::get ('/clearhistory', function(){
	$user_id=request('user_id');
		DB::delete('delete from search_history where user_id=?', array($user_id));
		$results=DB::select('select book_id, time from search_history where user_id=? order by time desc', array($user_id));
		return view ('viewhistory',compact('results'));
	
});
Route::get('/readfile',function()
{
	
	return "<embed src='".request('file')."' type='application/pdf' height='800px' width='100%' >";
});
Route::get ('/viewtranslation/{book_id1}', function($book_id1){
	$results= DB::select("	
		select translations_id as id
		from book_translations
		where book_id=$book_id1;
			");
	return view ('viewtranslation',compact('results'));
});
Route::get ('/addtranslation/{book_id1}', function($book_id1){
	return view ('addtranslation',compact('book_id1'));
});
Route::post('/addtrans',function(){
	$book_id=request('book_id');
	$name=request('name');
	$translator=request('translator');
	$publisher=request('publisher');
	$language=request('language');
	$year=request('year');
	$keywords=request('keywords');
	$description=request('description');
	$accession_no=DB::select ("select accession_no as a from book where book_id=?",[$book_id]);
	$accession_no=$accession_no[0]->a;
	DB::insert('insert into translations (accession_no, name, translator,  keywords, description, year) values (?,?,?,?,?,?)', [$accession_no, $name,$translator, $keywords, $description,$year]);
	$t_id=DB::select("select max(translations_id) as luck from translations");
	$t_id=$t_id[0]->luck;
	    
	DB::insert('insert into book_translations values (?,?)' , [$t_id,$book_id]);
	if (!empty($publisher)){
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
	    DB::insert('insert into translations_publisher values (?,?)', [$p_id,$t_id]);
	}
	
	
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
	DB::insert('insert into translations_language values (?,?)' , [$l_id,$t_id]);
	//DB::insert('insert into relations (book_id, author_id,genre_id,publisher_id,language_id) values (?,?,?,?,?)' , [$b_id,$a_id, $g_id, $p_id, $l_id]);
	$book_id1=$book_id;
		return view('addtranslation', compact('book_id1'));
	
});

    
	Route::get ('/addcomment', function(){	
	$user_id= request('user_id');
	$book_id=request ('book_id');
	$comment=request ('comment');
	$id1=DB::select ('select id from relations where book_id=?', array ($book_id));
	$id=$id1[0]->id;
	if (!empty($user_id))
		DB::insert('insert into comment (book_id,comment, user_id, created_at) values (?,?,?,?)' , [$book_id,$comment,$user_id, new DateTime()]);
	else
		echo "Please log in to add a comment....";
	return view('display',compact('id','user_id'));
});
Route::get ('/bookmark', function(){	
	$user_id= request('user_id');
	$book_id=request ('book_id');
	$id1=DB::select ('select id from relations where book_id=?', array ($book_id));
	$id=$id1[0]->id;
	if (!empty($user_id)){
		$results=DB::select ('select * from bookmark where user_id=? and book_id=?', array($user_id, $book_id));
		if (empty($results))
		DB::insert('insert into bookmark (book_id, user_id, created_at) values (?,?,?)' , [$book_id, $user_id, new DateTime()]);
		else
		DB::delete('delete from bookmark where book_id=? and user_id=?', array($book_id, $user_id));
	}
	else
		echo "Please log in to bookmark....";
	return view('display',compact('id','user_id'));
});

Route::get('/adv2', function () { return view('advsearch2');});
Route::get('/search1', function(){
	$name = request('name');
	$mytext = request('mytext');
	$place = request('place');
	$count=0;

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
