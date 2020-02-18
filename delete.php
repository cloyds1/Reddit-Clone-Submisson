<?php 

require('functions.php');
require('header.php');

$posts = readJson('data.json');

?>


<body>


<?php 
	
	require('nav_bar.php');
?>

<h3 class="full-post-style">Select a post you wish to delete.</h3>

<?php	

	if($posts != NULL){
		echo '<div>';
		echo '<form action="deleteHandler.php" method="get">';
		for($count = 0; $count < count($posts); $count++){
			echo '<div class="full-post-style"><p class="post-header-style">Posted by '.$posts[$count][0].' on: ' .$posts[$count][1].'</p><hr><h2>'.$posts[$count][2].'</h2><br>
			Delete? <input type="hidden" name="delete'.$count.'" value="0"><input type="checkbox" name="delete'.$count.'" value="1"></div>';
					
		}
		
		echo '<span style="margin-left: 25%;"><input type="submit" value="Submit"><input type="reset" value="Reset"></span></form></div>';
	}
			
	else{
				echo "<h2 class='full-post-style'>We're sorry, but there doesn't seem to be anything to delete right now.</h2>";
			}
			
		?>
</body

<?php
require('footer.php');
?>