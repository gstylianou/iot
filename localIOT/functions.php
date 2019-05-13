<?php
include_once 'defaults.php';

/*
function getValueForCommand($command) {
	
	global $con;
	
	$ans = mysqli_query($con,"select value from remoteController where name='$command'");

	$row = mysqli_fetch_array($ans);

    $value = $row[0];
	
    mysqli_free_result($ans);

	return $value;
	}
*/

function online() {
	$ip=getIP();

	return isOnline($ip);
	
}


function isOnline($ip)
{

if (!$fp = curl_init($ip)) return false;
return true;
	
	
}
function postPowerOnCommand()
{
	$ip=getIP();
	
	if(!isOnline($ip))
	{ //echo "\nNOT ONLINE\n";
	return "false";
	}
	$url=$ip . "/sony/system";
	$body="{\"id\":5,\"method\":\"setPowerStatus\",\"version\":\"1.0\",\"params\":[{\"status\":true}]}";
	
	
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $body,
			CURLOPT_HTTPHEADER => array(
					"X-Auth-PSK:". getKey()
			),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	if($response)
	  {		
		$ans=json_decode($response,true);
		
        if(isset($ans['error']))
        	return "false";
        return "true";
	  }
		if($err)
			echo "error=$err\n";
			
			curl_close($curl);
			
			return "true";
			
	
	
}


function postCommand($value)
{
	$ip=getIP();
	
	if(!isOnline($ip))
	{ echo "\nNOT ONLINE\n";
		return "false";
	}	
	$url=$ip . "/sony/IRCC";
    $body="<?xml version=\"1.0\"?>
	       \n<s:Envelope xmlns:s=\"http://schemas.xmlsoap.org/soap/envelope/\" s:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
		   \n  <s:Body>
		   \n    <u:X_SendIRCC xmlns:u=\"urn:schemas-sony-com:service:IRCC:1\">
		   \n      <IRCCCode>". $value . "</IRCCCode></u:X_SendIRCC></s:Body></s:Envelope>";
			

			
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $body,
	CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: f67412c8-6278-0d97-91a1-82c9e41cbf7d",
	"X-Auth-PSK:". getKey()
  ),
));
//var_dump(curl_getinfo($curl));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($response)
   echo $response;

if($err)
{ echo "ERROR ON POST COMMAND $err\n";
  return "false";
}



return "true";
	
}

?>