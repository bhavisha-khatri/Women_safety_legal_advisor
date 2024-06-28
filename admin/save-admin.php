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
	$status = isset($_POST['status']) ? $_POST['status'] : 0;

	$sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
	if ($id) {
		$sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and id <> $id");
	}
	if ($sql->num_rows > 0) {
		$message = "Please choose a different username.";
		$response = array("status" => 'failed', "message" => $message);
		echo json_encode($response);
		return null;
	}
	if ($id) {
		$message = "Admin updated successfully";
		$sql = mysqli_query($conn, "UPDATE admin SET name = '$name',username = '$username',email_id = '$email_id',password = '$password',status = '$status' WHERE id = $id");
	} else {
		$message = "Admin added successfully";
		$sql = mysqli_query($conn, "INSERT INTO admin(name,username,email_id,password,status) values('{$name}', '{$username}', '{$email_id}', '{$password}','{$status}')");
	}

	if ($sql) {
		$response = array("status" => 'success', "message" => $message);
	} else {
		$response = array("status" => 'failed', "message" => "Error:" . $sql . $conn->error);
	}
	echo json_encode($response);
}
