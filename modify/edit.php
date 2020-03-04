<?php 

session_start();
require('../utils/fileUtil.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}


$posts = readJson('../dataFiles/data.json');


require('../rsrc/header.php');

?>


<body>

<?php require('../rsrc/nav_bar.php'); ?>

<h3 class="full-post-style">Select a post you wish to edit.</h3>

<?php	
	
	
	if($posts != NULL){
		
		for($count = 0; $count < count($posts); $count++){
			if($posts[$count]['author'] != $_SESSION['username']){continue;}
			echo '<a href="editForm.php?id='.$count.'"><div class="full-post-style box"><p class="post-header-style">Posted by '.$posts[$count]['author'].' on: ' .$posts[$count]['date'].'</p><hr><h2>'.$posts[$count]['title'].'</h2><br>
			</div></a>';
					
		}
		
		
	}
			
	else{
				echo "<h2 class='full-post-style'>We're sorry, but there doesn't seem to be anything to edit right now.</h2>";
			}
			
		?>
</body
</body

<?php
require('../rsrc/footer.php');
?>