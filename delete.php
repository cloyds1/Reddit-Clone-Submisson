<?php 

session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

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
			echo '<div class="full-post-style"><p class="post-header-style">Posted by '.$posts[$count]['author'].' on: ' .$posts[$count]['date'].'</p><hr><h2>'.$posts[$count]['title'].'</h2><br>
			Delete? <input type="checkbox" name="id[]" value="'.$count.'"></div>';
					
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