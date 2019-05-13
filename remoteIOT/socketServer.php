<?php
include_once 'defaults.php';

function turnOnSocketServer($message)
{
	global $sock;
	global $msgsock,$socket_host,$socket_port;
	
	
error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address=$socket_host;
$port = $socket_port;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
	return;
}
$i=0;

socket_set_option($sock,SOL_SOCKET, SO_REUSEADDR, 1);


if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
	return;
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
		return;
}
   

// echo "waiting for a connection\n";
    
socket_set_block($sock);

if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
		return;
}

echo "connected\n";
$message= $message . "\n";
// echo $message;

socket_write($msgsock, $message, strlen($message));

$status = socket_read($msgsock, 5000, PHP_NORMAL_READ);


echo "Status is $status";

//$message1="acknowledge\n";

//socket_write($msgsock, $message1, strlen($message1));


socket_close($msgsock);
	
socket_close($sock);

return $status;

}
?>