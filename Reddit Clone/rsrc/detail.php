<?php
session_start();

require_once('../utils/jsonDatabaseUtil.php');
require_once('../utils/classes.php');

$post_container = new PostContainer('../dataFiles/data.json');

$id = $_GET['id'];

if(!isset($_GET['id'])){
	die('No id: go back to the <a href="index.php">Home page</a>');
}

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($post_container->getPosts())){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}

require("header.php");

?>


<body>
	
<?php 

require_once('nav_bar.php'); 
$post_container->getPostAtId($id)->echoPostFull();
require_once('footer.php');
?>


  
    

 