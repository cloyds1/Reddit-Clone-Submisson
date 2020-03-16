<?php 

session_start();

require_once('../utils/jsonDatabaseUtil.php');
require_once('../utils/classes.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$post_container = new PostContainer('../dataFiles/data.json');

require('../rsrc/header.php');
?>


<body>


<?php 
	
	require('../rsrc/nav_bar.php');
	
?>

<h3 class="full-post-style">Select a post you wish to delete.</h3>

<?php	
	
$post_container->echoPostsDelete($_SESSION);	
	
?>

</body

<?php
require('../rsrc/footer.php');
?>