<?php
include_once 'defaults.php';
ini_set("include_path", '/home/mecieuca/php:' . ini_get("include_path") );
// Pear Mail Library
require_once "Mail.php";
require_once "Mail/mime.php"; 
		
// global $socket_host;
// $ftp_username="mecieuca";
// $ftp_userpass="jaKhFal;12#X10";
// $ftp_server = $socket_host;
// $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
// $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

date_default_timezone_set('Europe/Athens');

	// check if a file exist
$path = "/home/mecieuca/camera/192.168.2.21_001216b80d82/"; //the path where the file is located


$file=date("Y-m-d");
//$file = "2017-08-03"; //the file you are looking for

$check_file_exist = $path.$file; //combine string for easy use

$full_path=$path.$file."/01/pic/";

echo $check_file_exist;



if(!file_exists($check_file_exist))
	return;

else 
	echo "file exists";


$contents=scandir($check_file_exist."/01/pic/");

email($check_file_exist."/01/pic/",$contents);

$command="rm -r $check_file_exist";
$output = shell_exec($command);

echo $command;







function email($path,$contents)
{
	
	echo "contents=$contents";
	
	$from = '<gstylianou@gmail.com>';
	$to = "<gstylianou@gmail.com>";
	//echo $to;
	$subject = "Attention: Motion Detected";
	$body = implode(" ",$contents);
	
	$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject,
			'MIME-Version' => "1.0",
			'Content-type' => "text/html; charset=iso-8859-1"
	);
	
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'attendance.euc@gmail.com',
			'password' => 'Qwerty123!@#'
	));
	$crlf = "\n";
	
	$mime = new Mail_mime(array('eol' => $crlf));
	$mime->setTXTBody($body);
	
foreach($contents as $file)	
{	echo $path."/".$file."\n";
   if($file=="." || $file=="..")
   	 ;
   else
	$mime->addAttachment($path."/".$file, 'image/jpeg');
}	
	$body = $mime->get();
	$headers = $mime->headers($headers);
	
	$mail = $smtp->send($to, $headers, $body);
	
	
	
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
	} else {
		echo('<p>Message successfully sent!</p>');
	}
	
	
}
