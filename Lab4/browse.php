<?php 
include ("config.php");
include("header.php");
?>
				


	<h2>Search books</h2>

            <div id="searchfield">
            <form action="browse.php" method="POST">
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

            <h2>Library</h2>
            

            <?php 
			# This is the mysqli version

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form

    $searchtitle = htmlentities($_POST['searchtitle']);
    $searchauthor = htmlentities($_POST['searchauthor']);

    $searchtitle = trim($searchtitle);
    $searchauthor = trim($searchauthor);

    $searchtitle = mysqli_real_escape_string($db, $searchtitle);
    $searchauthor = mysqli_real_escape_string($db, $searchauthor);

}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);



# Build the query. Users are allowed to search on title, author, or both

$query = " select * from books";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging

  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table class='reservedbook'>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($bookid, $title, $author, $onloan, $duedate);
    $stmt->execute();

    echo '<table cellpadding="12" class="results">';
    echo '<tr><b><td>ID</td> <b><td>Title</td> <td>Author</td><td>Reserved?</td> <td>Reserve</td> </b> </tr>';
    while ($stmt->fetch()) {
        if ($onloan == 0) $onloan = 'NO'; 
        else $onloan ="YES";
        echo "<tr class='availablebook'>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td>";
        echo "<td> $onloan </td>";
        echo '<td class="reservecell"><a href="reserve.php?bookid=' . urlencode($bookid) . '" class="reserve"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
			<br />
            

					

<?php include("footer.php");?>
				
