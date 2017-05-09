/*drop database if exists xblog ;
create database xblog default character set utf8 collate utf8_bin;
use xblog;*/
create table members(
	memberid int(11) primary key auto_increment,
	account varchar(120) not null unique,
	email varchar(255) not null unique,
	alias varchar(87) not null default"new user",
	password varchar(255),
	registered datetime,
	accesstoken char(80) unique,
	lastsignedin datetime);


create table articles(
	articleid int primary key auto_increment,
	author	int(11) not null,
	title	varchar(300) not null default "untitled article",
	article text,
	submitted datetime,
	lastupdate datetime,
	foreign key(author) references members(memberid));
	
create table userdata(
	userid int(9) unique,
	intro text,
	dateofbirth datetime,
	phone varchar(12),
	foreign key(userid) references members(memberid)
);


insert into members(account,email,alias,password,registered)values("HelloBaby","hello@helloworld.com","Babe","thisispassword",NOW());
	
insert into members(account,email,alias,password,registered)values("Hellby","lo@helloworld.com","Babd","thisispassword2",NOW());