<?php

include("config.php");
$title = "My reserved books";
include("header.php");
?>


<h2>My books</h2>

            <div id="searchfield">
            <form action="books.php" method="POST">
                <table cellpadding="6px">
                    <tbody>
                        <tr>
                            <td>Search by title:</td>
                            <td>Search by author:</td>
                            </td>
                        </tr>
                        <tr>
                            <td><INPUT type="text" name="searchtitle" class="searchbar">
                            <td><INPUT type="text" name="searchauthor" class="searchbar"></td>
                        </tr>
                        
                    </tbody>
                 
                </table>
                <INPUT type="submit" class="search" name="submit" value="Search">
            </form>
        </div>


<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select title, author, onloan, bookid from books where onloan is true";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " and title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " and author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " and title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}


# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($title, $author, $onloan, $bookid);
    $stmt->execute();
    
//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
//    $stmt2->bind_result($onloan, $bookid);
    

    echo '<table cellpadding="12" class="results">';
    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
    while ($stmt->fetch()) {
        if($onloan==1)
            $onloan="Yes";
       
        echo "<tr class='reservedbook'>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
        echo '<td class="reservecell"><a class="reserve" href="return.php?bookid=' . urlencode($bookid) . '">Return</a></td>';
        echo "</tr>";
        
    }
    echo "</table>";
    ?>


<?php include("footer.php");?>
				
