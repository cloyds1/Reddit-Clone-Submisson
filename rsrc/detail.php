<?php
session_start();

require('../utils/fileUtil.php');

$posts = readJson('../dataFiles/data.json');

$id = $_GET['id'];

if(!isset($_GET['id'])){
	die('No id: go back to the <a href="index.php">Home page</a>');
}

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($posts)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}

require("header.php");

?>


<body>
	
<?php 

require_once('nav_bar.php'); 
echo '<div class="full-post-style"><p class="post-header-style">Posted by '.$posts[$id]['author'].' on: ' .$posts[$id]['date'].'</p><hr><h2>'.$posts[$id]['title'].'</h2><br><p>'.$posts[$id]['content'].'</p></div></a>'; 
require_once('footer.php');
?>


  
    

 