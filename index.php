<?php 

$profileID = "22319";
$AccountID = "32707";
 
postApi("balance" , $profileID , $AccountID);

$method = $_SERVER['REQUEST_METHOD'];

function postApi($action,$profileID,$AccountID)
{
 
	$domain = "http://demosite3.fxsocio.com/webservices_new/getbalance_nilesh.php";
 
	if ($action == "balance" && isset($AccountID) && isset($profileID)) {
		$plain = "balance|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	 
	if ($action == "equity" && isset($profileID) && isset($AccountID)) {
		$plain = "equity|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
  
	if ( $action == "switchaccount" && isset($profileID) && isset($AccountID)  ) {
		$plain = "switchaccount|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}
	
	if ($action == "activeallocations" && isset($profileID) && isset($AccountID)){
		$plain = "activeallocations|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	 
	if ($action == "mysummary" && isset($profileID) && isset($AccountID)){
		$plain = "mysummary|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}
  
	if ($action == "setoption" && isset($profileID) && isset($AccountID)){
		$plain = "setoption|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}
	
	if ($action == "openposition" && isset($profileID) && isset($AccountID)){
		$plain = "openposition|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	
	if ($action == "closedposition" && isset($profileID) && isset($AccountID)){
		$plain = "closedposition|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	
	if ($action == "maxdd" && isset($profileID) && isset($AccountID)){
		$plain = "maxdd|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}
		
	if ($action == "returnofinvestment" && isset($profileID) && isset($AccountID)) {
		$plain = "returnofinvestment|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	
	if ($action == "availableinvested" && isset($profileID) && isset($AccountID)) {
		$plain = "availableinvested|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	
	if ($action == "totalinvested" && isset($profileID) && isset($AccountID)) {
		$plain = "totalinvested|".$profileID."|" ."$AccountID";
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	}	
	
	
	try
	{
		$ch = curl_init();
		if (FALSE === $ch){
		throw new Exception('failed to initialize');
	}
	curl_setopt($ch, CURLOPT_URL,$curlURL);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	echo $p_result = curl_exec($ch);

	if (FALSE === $p_result) {
	throw new Exception(curl_error(), curl_errno());
	curl_close($ch);
	} else{
	curl_close($ch);
	return $p_result;
	}
	}catch(Exception $e) {
	trigger_error(sprintf('Curl failed with error #%d: %s',$e->getCode(),
	$e->getMessage()),E_USER_ERROR); 
	return $output ; 
	}
}

	
 

# Encrypt a value using AES-256.
function encrypts($plain, $key = null, $hmacSalt = null) {
			
	# Private salt
	$salt = 'ZfTfbip&Gs0Z4yz3ZfTfbip&Gs0Z4yz3';
	# Private key
	$key =  'SDefrfdrghgfdfE)SDefrfdrghgfdfE)';
   
	$time = time();
	$plain = $plain."|".$time;
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = openssl_random_pseudo_bytes($ivlen);
	$ciphertext_raw = openssl_encrypt($plain, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$hmac = hash_hmac('sha256', $ciphertext_raw, $salt, $as_binary=true);
	$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
 
	return  $ciphertext;
}




?>
