<?php
include('connection.php');
include('defaults.php');

 $con=connectDB();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => getIP() . "/sony/system",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"id\":5,\"method\":\"getRemoteControllerInfo\",\"version\":\"1.0\",\"params\":[]}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: text/plain",
    "postman-token: a7c249c2-692d-0efb-f315-4388f40cd25f",
	"X-Auth-PSK:". getKey()
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 


deleteIRCommands();

$ans=json_decode($response,true);

$commands=$ans['result'][1];


insertIRCommands($commands);


?>