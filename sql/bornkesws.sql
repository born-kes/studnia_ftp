-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: my40
-- Czas wygenerowania: 15 Lis 2009, 23:43
-- Wersja serwera: 4.0.27
-- Wersja PHP: 5.2.11
-- 
-- Baza danych: 'bornkesws'
-- 

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'Czarna_lista'
-- 

CREATE TABLE Czarna_lista (
  id int(5) NOT NULL auto_increment,
  ip text NOT NULL,
  player text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'Marcin'
-- 

CREATE TABLE Marcin (
  id int(10) NOT NULL auto_increment,
  pkt int(5) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'ataki'
-- 

CREATE TABLE ataki (
  id int(12) NOT NULL default '0',
  cel int(10) NOT NULL default '0',
  pochodzenie int(10) NOT NULL default '0',
  kto int(10) NOT NULL default '0',
  godz int(10) NOT NULL default '0',
  co int(1) default NULL,
  UNIQUE KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'budy'
-- 

CREATE TABLE budy (
  id int(10) NOT NULL default '0',
  data int(10) NOT NULL default '0',
  budowa int(10) NOT NULL default '0',
  ratusz tinyint(2) NOT NULL default '0',
  koszary tinyint(2) NOT NULL default '0',
  stajnie tinyint(2) NOT NULL default '0',
  warsztat tinyint(2) NOT NULL default '0',
  palac tinyint(2) NOT NULL default '0',
  kuznia tinyint(2) NOT NULL default '0',
  plac tinyint(1) NOT NULL default '0',
  piedestal tinyint(1) NOT NULL default '0',
  rynek tinyint(2) NOT NULL default '0',
  tartak tinyint(2) NOT NULL default '0',
  cegielnia tinyint(2) NOT NULL default '0',
  huta tinyint(2) NOT NULL default '0',
  zagroda tinyint(2) NOT NULL default '0',
  spichlerz tinyint(2) NOT NULL default '0',
  schowek tinyint(2) NOT NULL default '0',
  mur tinyint(2) NOT NULL default '0',
  status tinyint(1) NOT NULL default '0',
  ludzie int(5) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'list_ataki'
-- 

CREATE TABLE list_ataki (
  id int(6) NOT NULL default '0',
  cel int(6) NOT NULL default '0',
  pochodzenie int(6) NOT NULL default '0',
  kto int(10) NOT NULL default '0',
  godz int(10) NOT NULL default '0',
  co char(26) NOT NULL default '0',
  UNIQUE KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'list_plemie'
-- 

CREATE TABLE list_plemie (
  id int(11) NOT NULL default '0',
  name varchar(25) NOT NULL default '',
  tag varchar(10) NOT NULL default '',
  UNIQUE KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'list_proxi'
-- 

CREATE TABLE list_proxi (
  id int(6) NOT NULL default '0',
  name text NOT NULL,
  ip varchar(16) NOT NULL default '',
  status tinyint(1) NOT NULL default '0',
  wz enum('T','N') NOT NULL default 'N',
  KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'list_user'
-- 

CREATE TABLE list_user (
  id int(7) NOT NULL default '0',
  name varchar(17) NOT NULL default '',
  ally int(10) NOT NULL default '0',
  haslo text NOT NULL,
  haslo2 text NOT NULL,
  nr_proxi mediumint(4) NOT NULL default '0',
  prawa tinyint(1) NOT NULL default '0',
  wtyczka enum('T','N') NOT NULL default 'N',
  UNIQUE KEY id (id),
  KEY ally (ally)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'list_zadan'
-- 

CREATE TABLE list_zadan (
  id int(14) NOT NULL auto_increment,
  data int(10) NOT NULL default '0',
  id_gracz int(10) NOT NULL default '0',
  opis text,
  id_cel int(6) default NULL,
  id_pochodzenie int(6) default NULL,
  PRIMARY KEY  (id),
  KEY id_gracz (id_gracz)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'ws_all'
-- 

CREATE TABLE ws_all (
  id int(6) NOT NULL default '0',
  x int(3) NOT NULL default '0',
  y int(3) NOT NULL default '0',
  name text NOT NULL,
  player int(7) NOT NULL default '0',
  points int(5) NOT NULL default '0',
  UNIQUE KEY id (id),
  KEY x (x,y)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'ws_mobile'
-- 

CREATE TABLE ws_mobile (
  id int(6) NOT NULL default '0',
  data int(10) NOT NULL default '0',
  mobile int(8) default '0',
  pik mediumint(5) NOT NULL default '0',
  mie mediumint(5) NOT NULL default '0',
  axe mediumint(5) NOT NULL default '0',
  luk mediumint(5) NOT NULL default '0',
  zw mediumint(5) NOT NULL default '0',
  lk mediumint(4) NOT NULL default '0',
  kl mediumint(4) NOT NULL default '0',
  ck mediumint(4) NOT NULL default '0',
  tar mediumint(4) NOT NULL default '0',
  kat mediumint(4) NOT NULL default '0',
  ry tinyint(1) NOT NULL default '0',
  sz tinyint(2) NOT NULL default '0',
  typ tinyint(1) default '0',
  UNIQUE KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'ws_opis'
-- 

CREATE TABLE ws_opis (
  id int(6) NOT NULL default '0',
  opis text NOT NULL,
  UNIQUE KEY id (id)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struktura tabeli dla  'ws_raport'
-- 

CREATE TABLE ws_raport (
  id int(6) NOT NULL default '0',
  data int(10) NOT NULL default '0',
  mur mediumint(2) default NULL,
  pik mediumint(6) default NULL,
  mie mediumint(6) default NULL,
  axe mediumint(6) default NULL,
  luk mediumint(6) default NULL,
  zw mediumint(6) default NULL,
  lk mediumint(6) default NULL,
  kl mediumint(6) default NULL,
  ck mediumint(6) default NULL,
  tar mediumint(6) default NULL,
  kat mediumint(6) default NULL,
  ry mediumint(6) default NULL,
  sz mediumint(6) default NULL,
  status tinyint(1) default '0',
  UNIQUE KEY id (id)
) TYPE=MyISAM;
