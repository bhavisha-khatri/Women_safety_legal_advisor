<?php

include '../connection.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password' ");
	if ($sql->num_rows > 0) {
		$response = array("status" => 'success', "message" => "Login success");
	} else {
		$response = array("status" => 'failed', "message" => "Invalid username and password");
	}
} else {
	$response = array("status" => 'failed', "message" => "Invalid request");
}
echo json_encode($response);
