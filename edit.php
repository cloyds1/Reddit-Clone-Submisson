<?php 

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
			echo '<a href="editForm.php?id='.$count.'"><div class="full-post-style box"><p class="post-header-style">Posted by '.$posts[$count][0].' on: ' .$posts[$count][1].'</p><hr><h2>'.$posts[$count][2].'</h2><br>
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