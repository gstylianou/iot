<?php 
include_once 'remote.php';
include_once 'getStatus.php';


function jsonToCommand($jsonString) {
	
	$ans=json_decode($jsonString,true);
	
	var_dump($ans);
	
	
	switch($ans["script"]) {
		case "remote": return sendCommandJson($ans["parameters"]); 
		               break;
		case "IRCommands": return getIRCommands();
							break;
		case "Status":return getStatus();
					break;
		default: break;
		
		
	}
	 
}






 ?>