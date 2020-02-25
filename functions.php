<?php


function readJson($file_name){
	if(file_exists($file_name)){
		$array = json_decode(file_get_contents($file_name), true);
		
		if(is_array($array)){
			return $array;
		}
		else {
			return [];
		}
		
	}
	
	else{
		return array();
	}
}

function writeJson($file_name, $data){
	
	//!encode all data
	$new_data = json_encode($data);
	
	
	
	//!write to file
	$handle = fopen($file_name, 'w');
	fwrite($handle, $new_data);
	
	
	
	//!close file
	fclose($handle);
	
	
}

function createEntry($data, $file_name){
	
	//!open & read file
	$file_data = readJson($file_name);
	
	if($file_data == NULL){
		$file_data = [$data];
	}
	
	else{
		array_push($file_data, $data);
	}
	
	//!append entry
	writeJson($file_name, $file_data);
	
	
}

function deleteEntry($id=[], $file_name){
	
	
	if(count($id) < 1){
		return True;
	}
	
	$file_data = readJson($file_name);
	
	
	$temp_data = [];
	for($count=0; $count < count($file_data); $count++){
		
		if(!in_array($count, $id)){
			
			array_push($temp_data, $file_data[$count]);
			
		}
	}
	
	writeJson(file_name, $temp_data);
	
	return True;
	
	
}

function editEntry($id, $data, $file_name){
	
	$file_data = readJson($file_name);
	

	if(isset($file_data[$id])){
		
		 $file_data[$id] = $data;
	
	}
	
	else{
		
		return false;
		
	}
	
	writeJson($file_name, $file_data);
	
}

function findUser($username, $password){

	$users = readJson('users.json');
	$message = 0;
	foreach($users as $user){
		if(in_array($username, $user) and in_array($password, $user)){
			return 1;
		}
		
		if(in_array($username, $user)){
			$message = 2;
		}
	}
	
	return $message;
	
}


?>