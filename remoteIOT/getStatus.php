<?php 
include('socketServer.php');
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

sendStatusCommand();



function sendStatusCommand()
{
	//start server and invoke local remote.php script.
	//remote.php
	//command=VolumeUp
	$message="{\"script\": \"Status\"}";
	
	
	$status=turnOnSocketServer($message);
	
	echo $status;
}

?>