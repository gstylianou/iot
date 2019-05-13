<?php 
include_once 'defaults.php';
$num=1000;
global $CAMERA_IP,$FFMPEG_PATH;
global $socket_host;

while(true)
{
set_time_limit(0);

// // This script will run continouasly and send the camera feed to the remote server.
 $command="$FFMPEG_PATH -i 'rtsp://$CAMERA_IP/user=admin&password&channel=1&stream=0.sdp' -f image2 -vframes $num -r 1 -s 320x240 -pix_fmt yuvj420p feed/%d.jpeg >/dev/null 2>/dev/null &";
 
//  if(function_exists('shell_exec')) {
//  	echo "system is enabled";
 	
//  }
// else 
// echo "shell_exec is disabled";

// $output=shell_exec('ls');

// echo "sys=$output  pre";

// return;

echo $command;
// return;

$output = shell_exec($command);

//  return;


// echo "must ftp";
// return;

// // ftp://meci.euc.ac.cy/public_ftp

$ftp_username="mecieuca";
$ftp_userpass="jaKhFal;12#X10";
$ftp_server = $socket_host;
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

if($login)
{
	echo "Connection established.";
	
}
else
{
	echo "Couldn't establish a connection.";
	return;
}

for($i=1;$i<=$num;$i++)
{
  $count=0;
	while(!file_exists("feed/$i.jpeg"))
	{  sleep(1);
	   echo "waiting for $i.jpeg\n";
	   $count++;
	   if($count>100)
	   	break;
	}
	if($count>100)
	{
		
		break;
	}
echo "$i.jpeg exists\n";
//return;

// upload file
	if (ftp_put($ftp_conn, "camera/$i.jpeg","feed/$i.jpeg", FTP_BINARY))
		{
			echo "Successfully uploaded feed/$i.jpeg.";
			unlink("feed/$i.jpeg");
		}
	else
		{
			echo "Error uploading feed/$i.jpeg.";
		   return;	
		}
}



ftp_close($ftp_conn);

}
?>