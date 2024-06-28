<?php
include '../connection.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? $_POST['id'] : '';

if ($id) {
   $sql = mysqli_query($conn, "select * from legal_resource where id = '{$id}'");

   if ($sql->num_rows === 0) {
      $id = "";
      $message = "Leagal resource with id {$id} not available ";
      $response = array("status" => 'failed', "message" => $message);
      echo json_encode($response);
   }
}
if ($id) {
   $sql = mysqli_query($conn, "DELETE FROM legal_resource WHERE id = $id");
   $message = "Legal resource deleted successfully.";

   if ($sql) {
      $resourcesql = mysqli_query($conn, "SELECT legal_resource.id, legal_resource.title, legal_resource.content, legal_resource.upload_date,legal_resource.author, admin.name
      FROM legal_resource
      LEFT JOIN admin ON legal_resource.author = admin.id order by legal_resource.id desc");

      $table = '<table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
         <th>Id</th>
         <th>Title</th>
         <th>Content</th>
         <th>Upload Date</th>
         <th>Author</th>
         <th>Action</th>
        </tr>
      </thead>
      <tbody>';
      while ($row = mysqli_fetch_assoc($resourcesql)) {
         $table .= "<tr>";
         $table .= "<td>" . $row['id'] . "</td>";
         $table .= "<td>" . $row['title'] . "</td>";
         $table .= "<td>" . $row['content'] . "</td>";
         $table .= "<td>" . $row['upload_date'] . "</td>";
         $table .= "<td>" . $row['name'] . "</td>";
         $table .= "<td><a href='add-legal-resource.php?id=" . $row['id'] . "'>Edit</a> |
          <a  class='delete-record' data-action='delete-legal-resource' data-id='" . $row['id'] . "' href='delete-legal-resource.php?id=" . $row['id'] . "'>Delete</a></td>";
         $table .= "</tr>";
      }
      $table .= "</tbody></table>";
      $response = array("status" => 'success', "message" => $message, "data" => $table);
   }
   echo json_encode($response);
}
