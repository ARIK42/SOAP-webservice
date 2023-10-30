<?php


//create a method to delete Item for the respective catalogid
function delCatalogEntry($UnitID){
  $conn = new mysqli("localhost", "root", "","hotel");
  
  $query = "SELECT * FROM hotel_info WHERE UnitID = '$UnitID';";
  $result = $conn->query($query) or die("Could not execute sql command.");
  
  if($row = mysqli_fetch_array($result))
	{
   	   $query = "DELETE FROM hotel_info WHERE UnitID = '$UnitID';";
	   $result = $conn->query($query) or die("Could not execute sql command.");
	   mysqli_close($conn);
	   echo "record removed";
	   return "record removed";
	}
	else
	{
	 	mysqli_close($conn);
		echo "record not found";
	 	return "record not found";
	}
}

//create a method to show (view) all the record by catalog id
function getCatalogEntry($UnitID) { 
   $conn = new mysqli("localhost", "root", "","hotel");
  
  
   if($UnitID==""||$UnitID==null){
	  $query = "SELECT * FROM hotel_info;";
	}
	else {
	  $query = "SELECT * FROM hotel_info WHERE UnitID = '$UnitID';";
	}
  
  $result = $conn->query($query) or die("Could not execute sql command.");
  
  mysqli_close($conn);

	$response = "<table border=1>
		 			<tr><th>UnitID</th>
    					<th>Hotel</th>
						<th>Location</th>
						<th>Rate</th>
						<th>Available</th>
						<th>Capacity</th>
    				</tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result))
	{
	 	 $response = $response."
		  <tr>
			<td>".$row['UnitID']."</td>
    		<td>".$row['Hotel']."</td>
			<td>".$row['Location']."</td>
			<td>".$row['Rate']."</td>
			<td>".$row['Available']."</td>
			<td>".$row['Capacity']."</td>
		  </tr>";
		
		
		$count++;
	} 
	$response = $response."</table>";

	echo $response;
	return $response;
} 


//create edit method to allow data update
function editCatalogEntry($id,$hotel,$loc,$r,$a,$c){
  $conn = new mysqli("localhost", "root", "","hotel");
  
  $query = "SELECT * FROM hotel_info WHERE UnitID = '$id';";
  $result = $conn->query($query) or die("Could not execute sql command.");
  if($row = mysqli_fetch_array($result))
	{
    	$query = "UPDATE hotel_info SET Rate = '$r',Location = '$loc', Available = '$a',
		Capacity = '$c', Hotel = '$hotel' WHERE UnitID = '$id';";
  	
		if($conn->query($query))
  		{
  		 	mysqli_close($conn);
			echo '<script>alert("Record has been updated")</script>';
			return "Record edited";
  		}
  		else
		{
			mysqli_close($conn);
			echo "fail";
			return "fail.";
		}  
	}
	else
	{
	 		mysqli_close($conn);
			echo "Record could not be found";
	 		return "Record could not be found";
	}	
}




//create the add method
function addCatalogEntry($id,$hotel,$loc,$r,$a,$c){
	//create connection to mysql
	$conn = new mysqli("localhost","root", "", "hotel");	
	
	//check if Item exist or not in the database. if exist, return duplicate record,
	//otherwise, add into database table called catalog
	if ($conn->connect_error) {
  	  die("Connection failed: " . $conn->connect_error);
  	}
  	echo "Connected successfully";
  	
  	$query = "SELECT * FROM hotel_info WHERE UnitID = '$id';";
  	
  	$result = $conn->query($query) or die("Could not execute SQL command.");
  	if($row = mysqli_fetch_array($result))
	{  
	 		mysqli_close($conn); 
	 		return "Record already exists";
	}
	else if($id <0)
	{
		mysqli_close($conn);
		return "Enter valid UnitID (*do not enter negative values)";
	}
	else
	{	
		$query = "INSERT INTO hotel_info (UnitID, Hotel, Location, Rate, Available, Capacity) VALUES ('$id', '$hotel', '$loc', '$r', '$a', '$c');";
    
  	if($conn->query($query))
  	{
  	 	mysqli_close($conn);
  		return "Record has been added";
  	}
  	else
  	{
  	  mysqli_close($conn);
  		echo "fail";
  		return "fail.";
  	}  
	}	
}

ini_set("soap.wsdl_cache_enabled", "0"); 
$server = new SoapServer("catalog.wsdl"); 		//specify the wsdl file
$server->addFunction("getCatalogEntry"); 
$server->addFunction("delCatalogEntry");
$server->addFunction("addCatalogEntry");
$server->addFunction("editCatalogEntry");
$server->handle(); 
?>