<?php

$dbc = new mysqli('localhost', 'root', '', 'ajax-new');

$CityID = $dbc->real_escape_string($_GET['cityID']);

$sql = "SELECT SuburbName, SuburbID FROM Suburbs WHERE CityID = $CityID";

$result = $dbc->query($sql);

if($result->num_rows > 0){

	// Extract the results and convert into json
	$suburb = json_encode( $result->fetch_all(MYSQLI_ASSOC));

	// Prepare the header to say we are about to send JSON not text
	header('Content-Type: application/json');

	echo $suburb;
} else {
	echo "error";
}

?>