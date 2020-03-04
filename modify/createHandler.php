<?php 

session_start();

require('../utils/fileUtil.php');
require('../utils/createUtil.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$data = ['author' => $_SESSION['username'], 'date' => date('M d, Y'), 'title' => strip_tags($_POST['title']), 'content' => strip_tags($_POST['content'])];
createEntry($data, '../dataFiles/data.json');

header('Location: ../index.php');

?>



