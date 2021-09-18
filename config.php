<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="prediction";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$dir_name = dirname("http://localhost/prediction-admin/posters/img");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>