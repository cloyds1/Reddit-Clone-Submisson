<?php


require('functions.php');

$posts = readJson('data.json');
require('header.php');

?>




  <body>
  <?php
	require('nav_bar.php');
	?>
  
	<div class="post-area">
		<?php 
			if($posts != NULL){
				for($count = 0; $count < count($posts); $count++){
					echo '<a href="detail.php?id='.$count.'"><div class="post-style box"><p class="post-header-style">Posted by '.$posts[$count][0].' on: ' .$posts[$count][1].'</p><hr><h2>'.$posts[$count][2].'</h2><br><p>'.$posts[$count][3].'</p></div></a>';
					
				}
			}
			
			else{
				echo "<h2 class='post-style'>We're sorry, but there doesn't seem to be anything to display right now.</h2>";
			}
			
		?>
	</div>
    

    <?php require('footer.php'); ?>