<?php 

	session_start();
	
	if(isset($_SESSION['username']) and $_SESSION['username'] != ''){
		$_SESSION = [];
		session_destroy;
	}
	header('Location: ../index.php');
	
?>