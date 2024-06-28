<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legal_advisor";

define('ROOT_DIR', '/legal_advisor/');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
