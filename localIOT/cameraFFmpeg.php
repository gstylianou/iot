<?php
include_once 'defaults.php';
$num=1000;
global $CAMERA_IP,$FFMPEG_PATH;
global $socket_host;

	set_time_limit(0);
	
	// // This script will run continouasly and send the camera feed to the remote server.
	$command="$FFMPEG_PATH -i 'rtsp://$CAMERA_IP/user=admin&password&channel=1&stream=0.sdp' -f image2 -vframes $num -r 1 -s 320x240 -pix_fmt yuvj420p feed/%d.jpeg >/dev/null 2>/dev/null &";
		
	$output = shell_exec($command);

	echo $output;
	
