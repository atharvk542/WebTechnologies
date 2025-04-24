<!-- N Pandya Nov. 2020 My config file connecting to the server -->
<?php

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
 
// Create connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>