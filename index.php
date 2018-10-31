<?php 

$method = $_SERVER['REQUEST_METHOD'];

function postApi($action,$profileID,$AccountID)
{
 
	$domain = "http://demosite3.fxsocio.com/";
 
	$gettextArray = explode(" ",$text);
	//print_r($gettextArray);
	
	if ($action == "balance" && isset($AccountID) && isset($profileID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=balance&profileID=$profileID&AccountID=".$AccountID ;
	 
	if ($action == "equity" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=equity&profileID=$profileID&AccountID=".$AccountID ;
  
	if ( $action == "switchaccount" && isset($profileID) && isset($AccountID)  )
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=switchaccount&profileID=$profileID&AccountID=".$AccountID ;
	
	if ($action == "activeallocations" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=activeallocations&profileID=$profileID&AccountID=".$AccountID;
	 
	if ($action == "mysummary" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=mysummary&profileID=$profileID&AccountID=".$AccountID;
  
	if ($action == "setoption" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?text=".$text."&keyworddetails=setoption&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "openposition" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=openposition&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "closedposition" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=closedposition&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "maxdd" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=maxdd&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "returnofinvestment" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=returnofinvestment&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "availableinvested" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=availableinvested&profileID=$profileID&AccountID=".$AccountID;
	
	if ($action == "totalinvested" && isset($profileID) && isset($AccountID))
	  $curlURL = $domain."webservices_new/getbalance.php?keyworddetails=totalinvested&profileID=$profileID&AccountID=".$AccountID;
	
	
	try
	{
		$ch = curl_init();
		if (FALSE === $ch){
		throw new Exception('failed to initialize');
	}
	curl_setopt($ch, CURLOPT_URL,$curlURL );
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$p_result = curl_exec($ch);
		
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

	
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$domain = "http://demosite3.fxsocio.com/";
	$json = json_decode($requestBody);

	$profileID = "22319";
	$AccountID = "32707";

	$action = $json->result->action;
	$check->speech =  $action;
	$check->displayText =  $action;

	$AccountID = $json->result->contexts[0]->parameters->accountID;
	$profileID  = $json->result->contexts[0]->parameters->profileID;


	$check->AccountID =  $AccountID;
	$check->profileID =  $profileID;


	
	switch ($action) 
	{
		 
	
		case 'hi':
			$check->speech =  "Hi, Its a worderful day , welcome to the Tradesocio ";
			$check->displayText =  "Hi, Its a worderful day , welcome to the Tradesocio ";
		break;
 

		case 'anything':
			$check->speech =  $action;
			$check->displayText =  $action;
		break;

		case 'balance':
			 $data = postApi($action,$profileID,$AccountID);
			 $check->speech =  $data;
			 $check->displayText =  $data;
		break;

		case 'equity':
			 $data = postApi($action,$profileID,$AccountID);
			 $check->speech =  $data;
			 $check->displayText =  $data;
		break;

		// case 'switchaccount':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;


		// case 'activeallocations':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;


		case 'openposition':
			 $data = postApi($action,$profileID,$AccountID);
			 $check->speech =  $data;
			 $check->displayText =  $data;
		break;


		// case 'closedposition':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;

		// case 'maxdd':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;

		// case 'returnofinvestment':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;

		// case 'availableinvested':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;

		// case 'totalinvested':
		// 	 $data = postApi($action,$profileID,$AccountID);
		// 	 $check->speech =  $data;
		// 	 $check->displayText =  $data;
		// break;

		default:
			$check->speech =  "Hi, Its a worderful day , welcome to the Tradesocio ";
			$check->displayText =  "Hi, Its a worderful day , welcome to the Tradesocio ";
		break;
	}

 
	echo json_encode($check);
	exit();
}
else
{
	echo "Method not alloweddddd";
}

?>
