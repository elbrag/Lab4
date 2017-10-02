

        <div class="container">
            <?php
            session_start();
            if (!isset($_SESSION['reservedbooklist'])) {
                echo "You have no reserved books";
                echo "<br><a href=index.php>Return to home page</a>";
                exit;
            }
            echo "You have reserved these books: <br> <br>";
// The list is maintained as a single string
// with the titles separated by slashes
// Split the list into separate titles and print them out
            
            #here you simply convert the list that looks like this "title/title/title/title"
            #test by running an echo of the session:
            echo $_SESSION['reservedbooklist'];
            
            
            #what you do here is actually convert above list into an array of strings for easier manipulation
            $reservedbooklist = explode("/", $_SESSION['reservedbooklist']);
            
            #go in with a foreach to echo out all of the titles.
            foreach ($reservedbooklist as $reservedbook) {
                echo $reservedbook . "<br>";
            }
            echo "<br><a href=index.php>Return to home page</a>";
            ?>

            
        </div>

