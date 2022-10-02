<?php
$servername   = "localhost";
$database = "optiklgk_wp924";
$username = "optiklgk_wp924";
$password = "6Sup2]!.d4p(Y1N)";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>