<?php
include_once 'jsonToCommand.php';
include_once 'defaults.php';

error_reporting(E_ALL);

global $socket_host,$socket_port;


$service_port = $socket_port; 

/* Get the IP address for the target host. */
 $address = gethostbyname('meci.euc.ac.cy');
//   $address = gethostbyname($socket_host);
 
//  $address=$socket_host;
  
 echo "address is:$address\n";
 
 //return;
 
//$address = gethostbyname('localhost');

do{
	echo "Attempting to connect"; //to '$address' on port '$service_port'...\n";
// 	return;
do{
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	
	$result=@socket_connect($socket, $address, $service_port);
	
	sleep(1);
	$err = socket_last_error($socket); 
	
// echo "result=$result\n";	
// 	return ;

}while(!$result);

// $in="works";
// echo $in;

$data = socket_read($socket, 2048, PHP_NORMAL_READ);

echo "received message=$data\n";

$num=strlen($data);




$ans=jsonToCommand($data);

echo "ans=$ans\n";

$out=$ans."\n";

socket_write($socket, $out, strlen($out));


socket_close($socket);

sleep(1);

}while(true);
?>