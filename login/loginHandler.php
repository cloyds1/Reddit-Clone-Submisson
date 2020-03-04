<?php
	
	session_start();
	
	require('../utils/fileUtil.php');
	require('../utils/searchUtil.php');
	
	$username = $_POST['usrname'];
	$password = $_POST['password'];
	
	switch(findUser($username, $password)){
		
		case 0:
			header('Location: login.php?message=fail-noaccnt');
			break;
		
		case 1:
			$_SESSION['username'] = $username;
			header('Location: ../index.php');
			break;
		
		case 2:
			header('Location: login.php?message=fail-wrongpass');
			break;
			
	}
		
		
		
	
	
	
		
		
	
	
	
	
	

?>