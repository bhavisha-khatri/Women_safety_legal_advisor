<?php

include '../connection.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$title = $_POST['title'];
	$content = $_POST['content'];
	$upload_date = $_POST['upload_date'];
	$author = $_SESSION['id'];

	if ($id) {
		$message = "Legal resource updated successfully";
		$sql = mysqli_query($conn, "UPDATE legal_resource SET title = '$title',content = '$content',upload_date = '$upload_date',author = '$author' WHERE id = $id");
	} else {
		$message = "Legal resource added successfully";
		$sql = mysqli_query($conn, "INSERT INTO legal_resource(title,content,upload_date,author) values('{$title}', '{$content}', '{$upload_date}', '{$author}')");
	}

	if ($sql) {
		$response = array("status" => 'success', "message" => $message);
	} else {
		$response = array("status" => 'failed', "message" => "Error:" . $sql . $conn->error);
	}
	echo json_encode($response);
}
