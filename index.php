<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "gamedb-2";

// Connect to the database
$connection = new mysqli($server, $username, $password, $dbname);

// Check Connection & return error if failed
if ($connection->connect_error) {

	// Kill Script on failure
	die("Connection failed: " . $conn->connect_error);

}


echo "Connected successfully";

// Query to fetch the list of game data
$sql = "SELECT GameID,Name,Description,Genre,Price FROM gamelist";

// Result of the query to fetch the game data

$result = $connection->query($sql);

echo "<ul>";

if ($result->num_rows > 0) { // There is at least 1 row of data in the table
	
	while($row = $result->fetch_assoc()) { // Iterate through the database table rows

		echo "<li> GameID: " . $row["GameID"] . " // Name: " . $row["Name"] . " // Description: " . $row["Description"] . " // Genre: " . $row["Genre"] . " // Price: " . $row["Price"];

	}

} else { // Database is empty

	// Show that no results were found

	echo "<li> No Results Were Found </li>";

}

echo "</ul>";

// Close the database now that the data was retrieved

$connection->close();

?>