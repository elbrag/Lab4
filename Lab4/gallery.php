<?php 
include ("config.php");
include("header.php");
?>

<h2>Gallery</h2>

<!--https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them
Made by Juliver Galleto at Stackoverflow
-->

<div id="gallery">

	<?php

		$dir = 'uploadedfiles';
		$images = scandir($dir);
		$ignore = Array(".", "..", ".DS_Store");

		foreach ($images as $curimg) {
			if(!in_array($curimg, $ignore)) {
				echo "<div class='galleryimage'>";
				echo "<div class='galleryimageinner'>";
				echo "<img src='uploadedfiles/$curimg' width='100%' /><br>\n";
				echo "</div></div>";
			} ;
		}

	?>

</div>
    

<?php include("footer.php");?>