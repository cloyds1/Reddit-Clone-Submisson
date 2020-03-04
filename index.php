<?php

session_start();

require_once('utils/fileUtil.php');


$posts = readJson('dataFiles/data.json');


?>




  <body>
  <?php
	require('rsrc/header.php');
	require('rsrc/nav_bar.php');
	?>
  
	<div class="post-area">
		<?php 
			if($posts != NULL){
				for($count = 0; $count < count($posts); $count++){
					echo '<a href="rsrc/detail.php?id='.$count.'"><div class="post-style box"><p class="post-header-style">Posted by '.$posts[$count]['author'].' on: ' .$posts[$count]['date'].'</p><hr><h2>'.$posts[$count]['title'].'</h2><br><p>'.$posts[$count]['content'].'</p></div></a>';
					
				}
			}
			
			else{
				echo "<h2 class='post-style'>We're sorry, but there doesn't seem to be anything to display right now.</h2>";
			}
			
		?>
	</div>
    

    <?php 
	
		require('rsrc/footer.php'); 
	
	?>