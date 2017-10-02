<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("config.php");
include("header.php");


$bookid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href='index.php'>Return to home page </a>");
        exit();
    }
    
   echo "You have reserved book nr"           .$bookid;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE books SET onloan=1 WHERE bookid = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href='browse.php'>Browse more books</a>");
    printf("<br><a href='books.php'>View my books</a>");
    exit;
    

include("footer.php");
    
?>
