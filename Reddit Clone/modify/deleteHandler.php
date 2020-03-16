<?php 
 
session_start();

require_once('../utils/jsonDatabaseUtil.php');
require_once('../utils/classes.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$post_container = new PostContainer('../dataFiles/data.json');


foreach($_POST['id'] as $i){
	
	$post_container->removePost($i);
	
}

$post_container->flushToFile('../dataFiles/data.json');
	
require('../rsrc/header.php');
?>


<body>
<?php require('../rsrc/nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Posts deleted!</h1>
	
</div>
</body

<?php
require('../rsrc/footer.php');
?>