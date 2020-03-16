<?php

session_start();

require_once('utils/jsonDatabaseUtil.php');
require_once('utils/classes.php');

$post_container = new PostContainer('dataFiles/data.json');

?>




  <body>
  <?php
	require('rsrc/header.php');
	require('rsrc/nav_bar.php');
	?>
  
	<div class="post-area">
	
		<?php 
		$id = 0;
		foreach($post_container->getPosts() as $post){
			
			$post->echoPostList($id);
			$id++;
			
		}
		
		?>
		
	</div>
    

    <?php 
	
		require('rsrc/footer.php'); 
	
	?>