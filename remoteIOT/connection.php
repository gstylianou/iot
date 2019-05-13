<?php
include_once 'defaults.php';

function connectDB() {
// 		$con = mysqli_connect("localhost", "root", "", "remoteIOT");
	global $DB_host,$DB_user,$DB_password,$DB_name;
	
	
	$con = mysqli_connect($DB_host, $DB_user,$DB_password, $DB_name);
	
	if(!$con){

		echo 'Could not connect: '. mysqli_connect_errno();

	}

	
    return $con;	
	
}

function deleteIRCommands()
{
	$con=connectDB();
	
	$q="delete from remoteController";
	
	$ans=mysqli_query($con,$q);
	
	mysqli_close($con);
	
}

function insertIRCommands($commands)
{
	$con=connectDB();
	
	foreach ($commands as $name)
	{
		$q="insert into remoteController (name)  values ('$name')";
	
		$ans=mysqli_query($con,$q);
	}
	
	
	mysqli_close($con);
	
	
}

function getIRCommands()
{
	$con=connectDB();
	
	$q="select name from remoteController";
		
	$ans=mysqli_query($con,$q);
	
	$con=connectDB();
	
		
	$ans = mysqli_query($con,"select name from remoteController");
		
	$message="{\"script\": \"IRCommands\", \"parameters\":[";
		
	while ($row = mysqli_fetch_row($ans))
	    {
		  $name=$row[0];
		  $message = $message . "\"$name\",";
			
		}
		
	$message=rtrim($message,',');
	$message=$message . "]}";
		
	mysqli_free_result($ans);
		
		
	mysqli_close($con);
		
	return $message;
	
	
}



?>