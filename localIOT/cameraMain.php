<?php
include_once 'defaults.php';
$num=1000;

global $socket_host;

set_time_limit(0);

$num=1000;

while(true)
{
	
  $ftp_username="mecieuca";
  $ftp_userpass="jaKhFal;12#X10";
  $ftp_server = $socket_host;
  $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
  $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
echo "cameraMain";
if($login)
{
	echo "Connection established.";
	
}
else
{
	echo "Couldn't establish a connection.";
	//return;
}

for($i=1;$i<=$num;$i++)
{
	$count=0;
	while(!file_exists("feed/$i.jpeg"))
	{  
		sleep(1);
	    echo "waiting for $i.jpeg\n";
	    $count++;
	
	    if($count>10)
	     {  startFFmpeg();
	        $count=0;
	        sleep(5);
	     }
	}
	echo "$i.jpeg exists\n";
	//return;
	
	// upload file
	if (ftp_put($ftp_conn, "camera/$i.jpeg","feed/$i.jpeg", FTP_BINARY))
	{
		echo "Successfully uploaded feed/$i.jpeg.\n";
		unlink("feed/$i.jpeg");
	}
	else
	{
		echo "Error uploading feed/$i.jpeg.\n";
		//ftp_close($ftp_conn);
		//return;
		break;
	}
	
	if($i>=$num*0.9)
		startFFmpeg();
	
}

echo "close connection\n";

ftp_close($ftp_conn);

}


function startFFmpeg()
{
	$command="/data/data/com.alfanla.android.pws/bin/php /sdcard/pws/www/cameraFFmpeg.php </dev/null &";
	
	$output = shell_exec($command);
	
	
	
}


