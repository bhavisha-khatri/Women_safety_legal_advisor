<?php

include '../connection.php';
header('Content-Type: application/json');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$sql = mysqli_query($conn, "SELECT * FROM advocate WHERE username = '$username'");
if ($sql->num_rows > 0) {
	$message = "Advocate already registered with provided data. Please choose a different username.";
	$response = array("status" => 'failed', "message" => $message);
	echo json_encode($response);
	return null;
}
$sql = mysqli_query($conn, "INSERT INTO advocate(username,email_id,password,name,status) values('{$username}', '{$email}', '{$name}', '{$password}',1)");

if ($sql) {
	$response = array("status" => 'success', "message" => "Advocate registered successfully.");
} else {
	$response = array("status" => 'failed', "message" => "Error:" . $sql . $conn->error);
}
echo json_encode($response);
