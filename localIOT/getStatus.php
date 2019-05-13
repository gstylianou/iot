<?php 
include_once 'connection.php';
include_once 'functions.php';

// echo "getStatus.php is called\n";
//get power state

//  echo getStatus();

//get audio state



//unify in a single json


//return answer


function getStatus()
{
	$ip=getIP();
	

	if(!isOnline($ip))
	{ echo "\nNOT ONLINE\n";
   	  return "false";
	}
// 	echo "isonline\n";
	
	$powerStatus=postPowerStatusCommand($ip);

	$status_array=json_decode($powerStatus,true);


	$status=$status_array['result'][0]['status'];
	
	
	$ans['powerStatus']=$status;
	

	if($status=="standby")
	{ 
		$ans_json=json_encode($ans);
		return $ans_json;
	}
			
	$volumeStatus=postVolumeStatusCommand($ip);
	
    $volume=json_decode($volumeStatus,true);
	
	$ans['volumeStatus']=$volume['result'][0]; 
	
	$ans_json=json_encode($ans);

	
	return $ans_json;
	
}


function postPowerStatusCommand($ip)
{
	
	
	$url=$ip . "/sony/system";
	$body="{\"id\":1,\"method\":\"getPowerStatus\",\"version\":\"1.0\",\"params\":[]}";
	
	
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 3,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $body));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
// 	if($response)
// 		echo "response:$response\n";
		
		if($err)
		{ //echo "errorPower:$err\n";
		  return "{\"id\":1,\"result\":[{\"status\":\"standby\"}]}";
		}
			
			
		return $response;
			
}


function postVolumeStatusCommand($ip)
{
	
	
	$url=$ip . "/sony/audio";
	$body="{\"id\":1,\"method\":\"getVolumeInformation\",\"version\":\"1.0\",\"params\":[\"1.0\"]}";
	
	
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 3,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $body));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
// 	if($response)
// 		echo "response:$response\n";
		
// 		if($err)
// 			echo "error:$err\n";
			

   return $response;
			
}

?>