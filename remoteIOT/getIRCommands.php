<?php

include('socketServer.php');
include('connection.php');
include_once 'defaults.php';

global $user_ID;

if (isset($_GET['ID']))
	$ID = $_GET['ID'];
	else
		return;
	
if($ID==$user_ID)
	;
else
	return;

// if(($ans=haveCommands())==true)
// {
//   echo $ans;
	
// 	return;
	
// }

//  echo "no commands found\n";
//  echo "requesting commands\n";
 
 $message="{\"script\": \"IRCommands\"}";
 
  echo requestCommands($message);
 




function requestCommands($message)
{
	
	$status=turnOnSocketServer($message);
	
// 	echo "status=$status";
	$ans=json_decode($status,true);

	
	//var_dump($ans['parameters']);
	
	
// 	deleteIRCommands();
// 	insertIRCommands($ans['parameters']);
	
   return $status;
	
}


// function haveCommands()
// {
	
// 	$commands=getIRCommands();
// // 	var_dump($commands);
	
// 	$ans=json_decode($commands,true);
// 	if(count($ans['parameters'])==0)
// 		return false;
			
// 	return $commands;	

// }

?>