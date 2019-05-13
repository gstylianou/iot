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

if (isset($_GET['command'])) 
  $command = $_GET['command'];
else
	return;
$times = isset($_GET['repeat']) ? $_GET['repeat'] : 1;

// echo "sending command:$command\n";

sendCommand($command,$times);



function sendCommand($command,$times)
{
  //start server and invoke local remote.php script.
  //remote.php
  //command=VolumeUp
  $message="{\"script\": \"remote\", \"parameters\": {\"command\": \"$command\",\"repeat\": \"$times\"}}";
			
			
 $status=turnOnSocketServer($message);
 
 echo $status;
}
 

?>