<?php

include '../connection.php';
header('Content-Type: application/json');

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$name = test_input($_POST['name']);
	$username = test_input($_POST['username']);
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$state = $_POST['state'];
	$status = $_POST['status'];

	$sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	if ($id) {
		$sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and id <> $id");
	}
	if ($sql->num_rows > 0) {
		$message = "Please choose a different username.";
		$response = array("status" => 'failed', "message" => $message);
		echo json_encode($response);
		return null;
	}
	if ($id) {
		$message = "User updated successfully";
		$sql = mysqli_query($conn, "UPDATE users SET name = '$name',username = '$username',email_id = '$email_id',
		password = '$password',mobile = $mobile,street = '$street',city = '$city',pincode = '$pincode',state = '$state',status = '$status' WHERE id = $id");
	} else {
		$message = "User added successfully";
		$sql = mysqli_query($conn, "INSERT INTO users(name,username,email_id,password,mobile,street,city,pincode,state,status) 
		values('{$name}', '{$username}', '{$email_id}', '{$password}', $mobile, '{$street}', '{$city}', '{$pincode}', '{$state}',$status)");
	}

	if ($sql) {
		$response = array("status" => 'success', "message" => $message);
	} else {
		$response = array("status" => 'failed', "message" => "Error:" . $sql . $conn->error);
	}
	echo json_encode($response);
}
