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
	$json->result->fulfillment->speech =  $action;

	echo json_encode($json);exit();

	$AccountID = $json->result->contexts->parameters->accountID;
	$profileID  = $json->result->contexts->parameters->profileID;
	 
	
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
