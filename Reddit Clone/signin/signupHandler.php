<?php 
	
	require_once('../utils/jsonDatabaseUtil.php');
	require_once('../utils/classes.php');

	$user_container = new UserContainer('../dataFiles/users.json');
	
	$username = $_POST['usrname'];
	$password = hash('sha256', $_POST['password']);
	
	$found = $user_container->findUser($username, '');
	
	if($found){
		
		
		header('Location: signup.php?message=name-conflict');
		
	}
		
	
	else {
		
		$user_container->addUser(new User($username, $password, ''));
		$user_container->flushToFile('../dataFiles/users.json');
		header("Location: ../login/login.php");
		
	}
	


?>



