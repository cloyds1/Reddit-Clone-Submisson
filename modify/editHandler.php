<?php 

session_start();

require('../utils/fileUtil.php');
require('../utils/editUtil.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$id = $_POST['id'];
$data = ['author' => $_SESSION['username'], 'date' => date('M d, Y'), 'title' => strip_tags($_POST['title']), 'content' => strip_tags($_POST['content'])];
editEntry($id, $data, '../dataFiles/data.json');

header('Location: edit.php');

?>
