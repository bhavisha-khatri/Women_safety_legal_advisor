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

	$target_dir = "images/";
	$target_file = "";

	if (!empty($_FILES) && $_FILES["photo"]["name"]) {
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);

		if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../" . $target_file)) {
			echo "File Uploaded";
		}
	}
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
	$licence_no = $_POST['licence_no'];
	$about_us = $_POST['about_us'];
	$court = $_POST['court'];
	$practice_area = $_POST['practice_area'];
	$experiance_year = $_POST['experiance_year'];
	$language = $_POST['language'];
	$specialization = $_POST['specialization'];
	$status = $_POST['status'];

	$sql = mysqli_query($conn, "SELECT * FROM advocate WHERE username = '$username'");
	if ($id) {
		$sql = mysqli_query($conn, "SELECT * FROM advocate WHERE username = '$username' and id <> $id");
	}
	if ($sql->num_rows > 0) {
		$message = "Please choose a different username.";
		$response = array("status" => 'failed', "message" => $message);
		echo json_encode($response);
		return null;
	}

	if ($id) {
		$message = "Advocate updated successfully";
		$sql = mysqli_query($conn, "UPDATE advocate SET name = '$name',username = '$username',email_id = '$email_id',password = '$password',
		mobile = $mobile,street = '$street',city = '$city',pincode = '$pincode',state = '$state',licence_no = '$licence_no',
		photo = '$target_file',about_us = '$about_us',court = '$court',practice_area = '$practice_area',
		experiance_year = '$experiance_year',language = '$language',specialization = '$specialization',status = '$status' WHERE id = $id");
	} else {
		$message = "Advocate added successfully";
		$sql = mysqli_query($conn, "INSERT INTO advocate(name,username,email_id,password,mobile,street,city,pincode,state,
		licence_no,photo,about_us,court,practice_area,experiance_year,language,specialization,status)
		 values('{$name}', '{$username}', '{$email_id}', '{$password}', $mobile, '{$street}', '{$city}',
		  '{$pincode}', '{$state}',  '{$licence_no}', '{$target_file}', '{$about_us}', '{$court}', '{$practice_area}',
		   '{$experiance_year}', '{$language}', '{$specialization}',$status)");
	}

	if ($sql) {
		$response = array("status" => 'success', "message" => $message);
	} else {
		$response = array("status" => 'failed', "message" => "Error:" . $sql . $conn->error);
	}
	echo json_encode($response);
}
