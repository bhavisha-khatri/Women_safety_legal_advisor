<?php
include '../connection.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? $_POST['id'] : '';

if ($id) {
   $sql = mysqli_query($conn, "select * from admin where id = '{$id}'");
   if ($sql->num_rows === 0) {
      $id = "";
      $message = "Admin with id {$id} not available ";
      $response = array("status" => 'failed', "message" => $message);
      echo json_encode($response);
   }
}

if ($id) {
   $sql = mysqli_query($conn, "DELETE FROM admin WHERE id = $id");
   $message = "Admin deleted successfully.";

   if ($sql) {
      $adminsql = mysqli_query($conn, "SELECT id,name,email_id,username,status FROM admin ORDER BY id DESC");
      $table = '<table id="example" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Username</th>
                <th>EmailId</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
      while ($row = mysqli_fetch_assoc($adminsql)) {
         $table .= "<tr>";
         $table .= "<td>" . $row['id'] . "</td>";
         $table .= "<td>" . $row['name'] . "</td>";
         $table .= "<td>" . $row['username'] . "</td>";
         $table .= "<td>" . $row['email_id'] . "</td>";
         if ($row['status'] == 0) {
            $table .= "<td>Deactive</td>";
         } else {
            $table .= "<td>Active</td>";
         }
         $table .= "<td><a href='add-admin.php?id=" . $row['id'] . "'>Edit</a> |
          <a  class='delete-record' data-action='delete-admin' data-id='" . $row['id'] . "' href='delete-admin.php?id=" . $row['id'] . "'>Delete</a></td>";
         $table .= "</tr>";
      }
      $table .= "</tbody></table>";
      $response = array("status" => 'success', "message" => $message/*, "data"=> $table*/);
   }
   echo json_encode($response);
}
