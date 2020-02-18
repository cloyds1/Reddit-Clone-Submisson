<?php


function readJson($file_name){
	if(file_exists($file_name)){
		return json_decode(file_get_contents($file_name), true);
	}
	
	else{
		return false;
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

function createEntry($data){
	
	//!open & read file
	$file_data = readJson('data.json');
	
	if($file_data == NULL){
		$file_data = [$data];
	}
	
	else{
		array_push($file_data, $data);
	}
	
	//!append entry
	writeJson('data.json', $file_data);
	
	
}

function deleteEntry($id){
	
	$file_data = readJson('data.json');
	if($file_data == NULL){
		
		return;
	
	}
	
	if(isset($file_data[$id])){
		
		unset($file_data[$id]); 
		
	
	}
	
	else{
		
		return false;
		
	}
	print_r($file_data);
	array_values($file_data);
	print_r($file_data);
	writeJson('data.json', $file_data);
	
	
}

function editEntry($id, $data){
	
	$file_data = readJson('data.json');
	if($file_data == NULL){
		
		return false;
	
	}
	
	if(isset($file_data[$id])){
		
		 $file_data[$id] = $data;
	
	}
	
	else{
		
		return false;
		
	}
	
	writeJson('data.json', $file_data);
	
}


?>