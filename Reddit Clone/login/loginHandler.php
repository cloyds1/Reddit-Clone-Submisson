<?php
	
	session_start();
	
	require('../utils/jsonDatabaseUtil.php');
	require('../utils/classes.php');
	
	$user_container = new UserContainer('../dataFiles/users.json');
	
	$username = $_POST['usrname'];
	$password = $_POST['password'];
	
	switch($user_container->findUser($username, $password)){
		
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