<?php
include_once 'connection.php';
include_once 'functions.php';
   
$con=connectDB();
  
if (isset($_GET['command'])) 
  $command = $_GET['command'];
else
  return;
$times = isset($_GET['repeat']) ? $_GET['repeat'] : 1;

sendCommand($command,$times);

mysqli_close($con);


function sendCommandJson($json_params)
{
	$command=$json_params["command"];
	$times=$json_params["repeat"];
	
	echo "sendCommand with json params: command=$command and repeat=$times\n";
	
	if(online())
	   return sendCommand($command,$times);
	else return "false";
}

function sendCommand($command,$times)
{
    $ans=true;
    if($command=="PowerOn")
    {  $ans=postPowerOnCommand();
       savePowerStatus("active");
    	return $ans;
    }
    

    
	$value=getValueForCommand($command);
	
	if($command=="VolumeUp" || $command=="VolumeDown") {
		
		if($times)
			sendVolumeCommand($command,$times); 
		else
			$ans=postCommand($value);
	}
	     else 
		   $ans=postCommand($value);
 
 if($command=="PowerOff" && $ans=="true")
     savePowerStatus("standby");
 
 return $ans;
}
 

function sendVolumeCommand($command,$times)
{

	$value=getValueForCommand($command);

	for($i=0;$i<$times;$i++)
		$ans=postCommand($value);
		
	return $ans;
}



?>