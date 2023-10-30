<link href="css/ADDELUPD.css" rel="stylesheet" type="text/css">
<?php
$id = $_POST['UnitID'];

	// creating soapClient object & specify the wsdl file
	$client = new SoapClient("catalog.wsdl"); 

	$response = $client->delCatalogEntry($id);
	
  	echo $response;
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=http://localhost/Hotel.html" />
    </head>
    <body><br>
<p>Redirecting back to home page.</p></br>';
echo '</body></html>';

?>