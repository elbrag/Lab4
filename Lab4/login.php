<?php 
include ("config.php");
include("header.php");
?>

<h2>Log in</h2>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#this function is for older PHP versions that use Magic Quotes.
#
//    function escapestring($input) {
//    if (get_magic_quotes_gpc()) {
//    $input = stripslashes($input);
//    }
//
//    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
//
//
//    return mysqli_real_escape_string($db, $input);
//
//    }

ini_set('session.cookie_httponly', true);
session_start ();

if (isset($_SESSION['userip']) === false){
    
    #here we store the IP into the session 'userip'
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
}

if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
    #if it is not the same, we just remove all session variables
    #this way the attacker will have no session
    session_unset();
    session_destroy();
    
}



@ $db = new mysqli('localhost', 'root', '', 'BookButler');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['userpass']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    
    
    $query = ("SELECT * FROM users WHERE username = '{$uname}' "." AND hash = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h4>Wrong username or password.</h4>';
            } else {
                echo '<h3>Welcome! Correct password.</h3>';
                header('Location: fileUpload.php'); 
            }
        }
        ?>
        <form method="POST" action="" id="loginform">
        	<label>Username</label><br />
            	<input type="text" name="username"><br />
            <label>Password</label><br />
            	<input type="password" name="userpass"><br />
            <input type="submit" class="submit" value="Go"><br />
        </form>



		


<?php include("footer.php");?>
