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
<?php require('nav_bar.php'); ?>

<h3 class="full-post-style">Select a post you wish to edit.</h3>

<?php	
	
	
	if($posts != NULL){
		
		for($count = 0; $count < count($posts); $count++){
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
require('footer.php');
?>