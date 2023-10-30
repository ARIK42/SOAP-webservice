<link href="css/tablestyle.css" rel="stylesheet" type="text/css">
<?php
$id = $_POST['UnitID'];

	// creating soapClient object & specify the wsdl file
	$client = new SoapClient("catalog.wsdl"); 

	
	$response = $client->getCatalogEntry($id);
	
  	echo $response;

?>

