<link href="css/ADDELUPD.css" rel="stylesheet" type="text/css">
<?php
$id = $_POST['UnitID'];
$hotel = $_POST['Hotel']; // $t = $_POST['ProductType'];
$loc = $_POST['Location']; //$n = $_POST['ProductName'];
$r = $_POST['Rate']; //$b = $_POST['ProductBrand'];
$a = $_POST['Available'];
$c = $_POST['Capacity'];


// creating soapClient object & specify the wsdl file
	$client = new SoapClient("catalog.wsdl"); 
//calling the function
	$response = $client->addCatalogEntry($id,$hotel,$loc,$r,$a,$c);
	
echo $response;
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=http://localhost/Hotel.html" />
    </head>
    <body><br>
<p>Please wait, you are being redirecting to main page.</p></br>';
echo '</body></html>';
?>