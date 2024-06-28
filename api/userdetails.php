<?php

include '../connection.php';
header('Content-Type: application/json');

$username = $_GET['username'];

$sql = mysqli_query($conn, "SELECT us.*,st.name as state_name,ci.name as city_name FROM users as us 
Left join states as st on us.state=st.id Left join cities as ci on us.city=ci.id where us.username = '$username' ");

if ($sql->num_rows > 0) {
	$row = mysqli_fetch_array($sql);
	$response = array("status" => 'success', "message" => "Login success", "data" => $row);
} else {
	$response = array("status" => 'failed', "message" => "No REcords Found!!");
}
echo json_encode($response);
