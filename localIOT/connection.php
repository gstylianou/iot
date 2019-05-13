<?php
// include_once 'defaults.php';

function connectDB() {
	global $DB_host,$DB_user,$DB_password,$DB_name;
	
	
//		$con = mysqli_connect("localhost", "root", "", "IOT");
	
	$con = mysqli_connect($DB_host,$DB_user,$DB_password,$DB_name);
	
	if(!$con){

		echo 'Could not connect: '. mysqli_connect_errno();

	}
   
	
    return $con;	
	
}

//queries must be inserted here

function getIP() {
	
// 	$con=connectDB();
	
// 	$ans = mysqli_query($con,"select ip from defaults");
	
// 	$row = mysqli_fetch_array($ans);
	
// 	$ip = $row[0];
	
// 	mysqli_free_result($ans);
	
// 	mysqli_close($con);
	
global $TV_IP;

	return $TV_IP;
}

function getKey()
{
// 	$con=connectDB();
	
// 	$ans = mysqli_query($con,"select authkey from defaults");
	
// 	$row = mysqli_fetch_array($ans);
	
// 	$key = $row[0];
	
// 	mysqli_free_result($ans);
	
// 	mysqli_close($con);
	
// 	return $key;
	
	global $TV_AUTH_KEY;
	
//	echo $TV_AUTH_KEY;
	
	return $TV_AUTH_KEY;
	
	
}

function getValueForCommand($command) {
	
	global $con;
	
	$ans = mysqli_query($con,"select value from remoteController where name='$command'");
	
	$row = mysqli_fetch_array($ans);
	
	$value = $row[0];
	
	mysqli_free_result($ans);
	
	return $value;
}

function getIRCommands()
{
	
	
	$con=connectDB();
	
	
	$ans = mysqli_query($con,"select name from remoteController");
	
	$message="{\"script\": \"IRCommands\", \"parameters\":[";
	
	while ($row = mysqli_fetch_row($ans))
	{
		$name=$row[0];
		$message = $message . "\"$name\",";
		
	}
// 	$message = $message . "\"PowerOn\",";
	$message=rtrim($message,',');
	$message=$message . "]}";
	
	mysqli_free_result($ans);
	
	
	mysqli_close($con);
	
	//     echo "JSON MESSAGE is:$message";
	return $message;
	
}

function deleteIRCommands()
{
	$con=connectDB();
	
	$q="delete from remoteController";
	
	$ans=mysqli_query($con,$q);
	
	mysqli_close($con);
}

function insertIRCommands($commands){
	
	$con=connectDB();
	
	foreach ($commands as $key => $val)
	{
		
		$name=$val['name'];
		$value=$val['value'];
		$q="insert into remoteController (name,value)  values ('$name','$value')";
		
		$ans=mysqli_query($con,$q);
		
		
	}
	$q="insert into remoteController (name,value)  values ('PowerOn','null')";
	
	$ans=mysqli_query($con,$q);
	
	mysqli_close($con);
	
	
}

function savePowerStatus($status)
{
	$con=connectDB();
	
	
	$q="update status set value='" . $status . "' where name='power'";
	
	
	$ans=mysqli_query($con,$q);
	
	mysqli_close($con);
	
	

}

?>