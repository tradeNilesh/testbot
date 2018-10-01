<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->intent->displayName;

	 
	switch ($text) {
		case 'hi':
			echo "inside hi";
			$json->queryResult->fulfillmentMessages->text->text = "Hi, Nice to meet you";
			break;

		case 'bye':
			echo "inside bye";
			$json->queryResult->fulfillmentMessages->text->text = "Bye, good night";
			break;

		case 'anything':
			echo "inside anything";
			$json->queryResult->fulfillmentMessages->text->text = "Yes, you can type anything here.";
			break;
		
		default:
			echo "inside default";
			$json->queryResult->fulfillmentMessages->text->text = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
 
	echo "inside final call";	
	echo json_encode($json);
	exit;
}
else
{
	echo "Method not alloweddddd";
}

?>
