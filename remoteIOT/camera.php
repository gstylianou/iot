<?php 
include_once 'defaults.php';

global $camera_path,$maxFrames;
global $user_ID;

if (isset($_GET['ID']))
	$ID = $_GET['ID'];
	else
		return;
		
		if($ID==$user_ID)
			;
		else
			return;

session_start();
if(!isset($_SESSION["frame"]))
    $_SESSION["frame"]=1;
else 
	$_SESSION["frame"]=$_SESSION["frame"]%$maxFrames+1;


//this will be used to send the camera feed to the user using json. 
//The json will have the script invocation to get a frame. 

//read camera feeds from
//google drive public folder
// https://drive.google.com/drive/folders/0B5XjJDyWupgVQTVZUkNXQzZ1dk0?usp=sharing
$fileOut=$camera_path . $_SESSION["frame"] . ".jpeg";

if (file_exists($fileOut)) {//this can also be a png or jpg
	
	//Set the content-type header as appropriate
	$imageInfo = getimagesize($fileOut);
	switch ($imageInfo[2]) {
		case IMAGETYPE_JPEG:
			header("Content-Type: image/jpeg");
			break;
		case IMAGETYPE_GIF:
			header("Content-Type: image/gif");
			break;
		case IMAGETYPE_PNG:
			header("Content-Type: image/png");
			break;
		default:
			break;
	}
	
	// Set the content-length header
	header('Content-Length: ' . filesize($fileOut));
	
	// Write the image bytes to the client
	readfile($fileOut);
	
}

?>