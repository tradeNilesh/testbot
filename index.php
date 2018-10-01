<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->intent->displayName;
 
	switch ($text) {
		case 'hi':
			$check->speech = "Hi, Nice to meet you";
			$check->displayText = "Hi, Nice to meet you";
			$check->source = "webhook-echo-sample";
			break;

		case 'bye':
		$check->speech = "Hi, Nice to meet you";
		$check->displayText = "Hi, Nice to meet you";
		$check->source = "webhook-echo-sample";
			break;

		case 'anything':
		$check->speech = "Hi, Nice to meet you";
		$check->displayText = "Hi, Nice to meet you";
		$check->source = "webhook-echo-sample";
			break;
		
		default:
		$check->speech = "Hi, Nice to meet you";
		$check->displayText = "Hi, Nice to meet you";
		$check->source = "webhook-echo-sample";
			break;
	}
 
	echo json_encode($check);
}
else
{
	echo "Method not alloweddddd";
}

?>
