<?php

// Connect to database
$dbc = new mysqli('localhost', 'root', '', 'ajax-new');

$CountryID = $dbc->real_escape_string($_GET['countryID']);

$sql = "SELECT CityName, CityID FROM Cities WHERE CountryID = $CountryID";

// Run the sql
$result = $dbc->query($sql);

// If there was a result
if($result->num_rows > 0){

	// Extract the results and convert into json
	$cities = json_encode( $result->fetch_all(MYSQLI_ASSOC));

	// Prepare the header to say we are about to send JSON not text
	header('Content-Type: application/json');

	echo $cities;
} else {
	echo "error";
}




