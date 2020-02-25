<?php 
	
	require('header.php');
	require('nav_bar.php');
	require('functions.php');
	
	$username = $_POST['usrname'];
	$password = $_POST['password'];
	$pair = ['username' => $username, 'password' => $password];
	print_r($pair);
	
	$users = readJson('users.json');
	
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
		header("Location: login.php");
		createEntry($pair, 'users.json');
	}
	
	
require('footer.php');


?>



