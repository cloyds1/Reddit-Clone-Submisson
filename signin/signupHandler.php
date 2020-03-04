<?php 
	
	require('../utils/fileUtil.php');
	require('../utils/createUtil.php');
	
	$username = $_POST['usrname'];
	$password = hash('sha256', $_POST['password']);
	
	$pair = ['username' => $username, 'password' => $password];
	print_r($pair);
	
	$users = readJson('../dataFiles/users.json');
	
	$not_found = True;
	foreach($users as $user){
		if($user['username'] != $username){
			continue;
		}
		
		else{
			header('Location: signup.php?message=name-conflict');
			$not_found = False;
			break;
		}
	}
	
	if($not_found){
		header("Location: ../login/login.php");
		createEntry($pair, '../dataFiles/users.json');
	}
	


?>



