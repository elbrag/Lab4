<?php

#our config file, has information about the database, about the current page we're on

$url = $_SERVER['REQUEST_URI']; //recognizes the url you're at right now

$strings = explode('/', $url); //explode breaks a string into chunks, split by the "dynamite" specified with '', in this case the \. Now we have a url split up with \s

$current_page = end($strings); //current_page has now captured for example "index.php"

$dbname = 'BookButler';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

#first you assign the URI (which is the end of the URL as we talked on the Lecture 2)
#You get that by using the superglobal $_SERVER['REQUEST_URI']
#then you create a new variable $strings which contains every string seperated by a "/" from the $url - hard to follow, ha?
#now that you have all strings 

//$url = $_SERVER['REQUEST_URI'];
//print_r($url);
//echo "</br>";
//$strings = explode('/', $url);
//print_r($strings);
//echo "</br>";
//$current_page = end($strings);
//print_r($current_page);
//echo "</br>";
//$dbname = 'library';
//$dbuser = 'root';
//$dbpass = '';
//$dbserver = 'localhost';
?>