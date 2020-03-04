<?php 

session_start();
require('../utils/fileUtil.php');
require('../utils/deleteUtil.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$posts = readJson('../dataFiles/data.json');

require('../rsrc/header.php');
?>


<body>


<?php 
	
	require('../rsrc/nav_bar.php');
	
?>

<h3 class="full-post-style">Select a post you wish to delete.</h3>

<?php	
	
	
	
	if($posts != NULL){
		
		echo '<div><form action="deleteHandler.php" method="post">';
		for($count = 0; $count < count($posts); $count++){
			if($posts[$count]['author'] != $_SESSION['username']){continue;}
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
require('../rsrc/footer.php');
?>