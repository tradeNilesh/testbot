<?php 

$method = $_SERVER['REQUEST_METHOD'];


	
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
	echo json_encode($check);exit();

	
	 
	
	switch ($action) 
	{
		 
	
		case 'hi':
		$check->fulfillmentText = "Hi, Its a worderful day , welcome to the Tradesocio ";
			//$check->displayText = "Hi, Nice to meet you";
			//$check->source = "webhook-echo-sample";
			break;
		
		case 'bye-bye':
		$check->fulfillmentText = "Hi...... bye bye";
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
			break;

		case 'anything':
		$check->fulfillmentText =  $action;
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
		break;
		
		default:
		$check->fulfillmentText = explodeKeyword($text) ;
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
			break;
	}

 
	echo json_encode($check);
}
else
{
	echo "Method not alloweddddd";
}

?>
