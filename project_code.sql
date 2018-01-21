-- create database lang;
-- use lang;
-- CREATE TABLE `books` 
-- (
-- `id` int(11) NOT NULL AUTO_INCREMENT,
-- `title` varchar(300) CHARACTER SET utf8 collate utf8_general_ci ,
-- `description` text CHARACTER SET utf8 collate utf8_general_ci,
-- PRIMARY KEY (`id`)
-- );
-- INSERT INTO books(title,description) VALUES (N'శ్రీనివాస్ తామాడా', N'新概念英语第');
-- INSERT INTO books (title, description) VALUES (N'ഗൗരി ലകീഭായി', N'ഹിനമതം');
-- select * from books;
-- drop database lang;
-- Starts from here
create database library;
use library;

drop table books;
CREATE TABLE books 
(
book_id int(11) AUTO_INCREMENT,
accession_no int UNIQUE,
title varchar(300) CHARACTER SET utf8 collate utf8_general_ci ,
keywords varchar(300) CHARACTER SET utf8 collate utf8_general_ci ,
description varchar (300) CHARACTER SET utf8 collate utf8_general_ci,
book_image varchar (40),
book_file varchar (40),
year int,
PRIMARY KEY (book_id)
);
insert into books (accession_no, title, keywords, description, year) values (1000, 'Harry Potter and the Philospher Stone', 'Harry, Ron, Hermione, Voldemort, Philosphers Stone, Quirrel, Snape', 'Harry Potter and the Philosophers Stone is a fantasy novel written by British author J. K. Rowling. It is the first novel in the Harry Potter series and Rowlings debut novel, first published in 1997 by Bloomsbury.',1997);
select * from books;


drop table translation;
create table translations
(
translation_id int auto_increment,
accession_no int UNIQUE,
title varchar(300) CHARACTER SET utf8 collate utf8_general_ci ,
translator varchar (30),
keywords varchar(300) CHARACTER SET utf8 collate utf8_general_ci ,
description text CHARACTER SET utf8 collate utf8_general_ci,
year int,
book_image varchar (40),
book_file varchar (40),
primary key (translation_id)
);
insert into translations (accession_no, title, translator, year) values (1001,'हैरी पॉटर और पारस पत्थर','सुधीर दीक्षित',1997);
insert into translations (accession_no, title, translator, year) values (1002,'हैरी पॉटर और रहस्यमयी तहखाना ','सुधीर दीक्षित',2005);


drop table author;
create table author(
                    author_id int auto_increment,
                    name varchar(50) CHARACTER SET utf8 collate utf8_general_ci,
                    number_of_books int default 0,
                    primary key (author_id) 
);
insert into author (name, number_of_books) values ('J.K. Rowling',1);

drop table genre;
create table genre(
                    genre_id int auto_increment,
                    name varchar(50) CHARACTER SET utf8 collate utf8_general_ci,
                    number_of_books int default 0,
                    primary key (genre_id) 
);
insert into genre (name, number_of_books) values ('Fantasy Fiction',1);

drop table publisher;
create table publisher(
                    publisher_id int auto_increment,
                    name varchar(50) CHARACTER SET utf8 collate utf8_general_ci,
                    number_of_books int default 0,
                    primary key (publisher_id)
);
insert into publisher (name, number_of_books) values ('Bloomsbury',1);
insert into publisher (name, number_of_books) values ('मंजुल पब्लिशिंग हाउस पवत. ल्टड',2);

drop table language;
create table language(
                    language_id int auto_increment,
                    name varchar(50) CHARACTER SET utf8 collate utf8_general_ci,
                    number_of_books int default 0,
                    primary key (language_id)
);

insert into language (name, number_of_books) values ('English',1);
insert into language (name, number_of_books) values ('हिन्दी',1);
update language set number_of_books=2 where name='हिन्दी';
 
drop table user;
create table user(
                    user_id int auto_increment,
                    name varchar(50),
                    username varchar(50) unique,
                    password varchar(30),
                    email varchar(30),
                    Date_of_Joining timestamp,
                    primary key (user_id)
);

drop table admin;
create table admin(
                    admin_id int auto_increment,
                    name varchar(50),
                    username varchar(50) unique,
                    password varchar(30),
                    email varchar(30),
                    Date_of_Joining timestamp,
                    primary key (admin_id)
);

create table book_translation
(
translation_id int,
book_id int,
foreign key (translation_id) references translations (translation_id),
foreign key (book_id) references books (book_id),
primary key (translation_id, book_id)
);
insert into book_translation values (1,1);

drop table book_author;
create table book_author
(
author_id int,
book_id int,
foreign key (author_id) references author (author_id),
foreign key (book_id) references books (book_id),
primary key (author_id, book_id)
);
insert into book_author values (1,1);

drop table book_genre;
create table book_genre
(
genre_id int,
book_id int,
foreign key (genre_id) references genre (genre_id),
foreign key (book_id) references books (book_id),
primary key (genre_id, book_id)
);
insert into book_genre values (2,1);

drop table book_publisher;
create table book_publisher
(
publisher_id int,
book_id int,
foreign key (publisher_id) references publisher (publisher_id),
foreign key (book_id) references books (book_id),
primary key (publisher_id, book_id)
);
insert into book_publisher values (1,1);

drop table book_language;
create table book_language
(
language_id int,
book_id int,
foreign key (language_id) references language (language_id),
foreign key (book_id) references books (book_id),
primary key (language_id, book_id)
);
insert into book_language values (1,1);

drop table translation_language;
create table translation_language
(
language_id int,
translation_id int,
foreign key (language_id) references language (language_id),
foreign key (translation_id) references translations (translation_id),
primary key (language_id, translation_id)
);
insert into translation_language values (2,1);
insert into translation_language values (2,2);


drop table translations_publisher;
create table translations_publisher
(
publisher_id int,
translation_id int,
foreign key (publisher_id) references publisher (publisher_id),
foreign key (translation_id) references translations (translation_id),
primary key (publisher_id, translation_id)
);
insert into translations_publisher values (2,1);
insert into translations_publisher values (2,2);

select * from translation_language;

delimiter |
create trigger update_count_author
after insert on book_author
for each row
begin
if (new.author_id is not NULL) then
update author
set number_of_books=number_of_books+1
where author.author_id=new.author_id;
end if;
end |
delimiter ;

delimiter |
create trigger update_count_publisher
after insert on book_publisher
for each row
begin
if (new.publisher_id is not NULL) then
update publisher
set number_of_books=number_of_books+1
where publisher.publisher_id=new.publisher_id;
end if;
end |
delimiter ;

delimiter |
create trigger update_count_language
after insert on book_language
for each row
begin
if (new.language_id is not NULL) then
update language
set number_of_books=number_of_books+1
where language.language_id=new.language_id;
end if;
end |
delimiter ;

drop trigger update_count_genre;
delimiter |
create trigger update_count_genre
after insert on book_genre
for each row
begin
if (new.genre_id is not NULL) then
update genre
set number_of_books=number_of_books+1
where genre.genre_id=new.genre_id;
end if;
end |
delimiter ;