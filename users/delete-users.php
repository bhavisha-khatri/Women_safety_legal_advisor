<?php
include '../connection.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';

if ($id) {
   $sql = mysqli_query($conn, "select * from users where id = '{$id}'");

   if ($sql->num_rows === 0) {
      $id = "";
      $message = "User with id {$id} not available ";
      $response = array("status" => 'failed', "message" => $message);
      echo json_encode($response);
   }
}
if ($id) {
   $sql = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
   $message = "Users deleted successfully.";
   if ($sql) {
      $userSql = mysqli_query($conn, "SELECT us.*,st.name as state_name,ci.name as city_name FROM users as us
       Left join states as st on us.state=st.id Left join cities as ci on us.city=ci.id ORDER BY id DESC");
      $table = '<table id="example" class="table table-striped" style="width:100%">';
      $table .= '<thead>
                     <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>EmailId</th>
                        <th>Mobile</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>State</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>';
      while ($row = mysqli_fetch_array($userSql)) {
         $table .= "<tr>";
         $table .= "<td>" . $row['id'] . "</td>";
         $table .= "<td>" . $row['name'] . "</td>";
         $table .= "<td>" . $row['username'] . "</td>";
         $table .= "<td>" . $row['email_id'] . "</td>";
         $table .= "<td>" . $row['mobile'] . "</td>";
         $table .= "<td>" . $row['street'] . "</td>";
         $table .= "<td>" . $row['city_name'] . "</td>";
         $table .= "<td>" . $row['pincode'] . "</td>";
         $table .= "<td>" . $row['state_name'] . "</td>";
         if ($row['status'] == 0) {
            $table .= "<td>Deactive</td>";
         } else {
            $table .= "<td>Active</td>";
         }
         $table .= "<td><a href='add-users.php?id=" . $row['id'] . "'>Edit</a> | 
         <a  class='delete-record' data-action='delete-users' data-id='" . $row['id'] . "' href='delete-users.php?id=" . $row['id'] . "'>Delete</a></td>";
         $table .= "</tr>";
      }
      $table .= "</tbody></table>";

      $response = array("status" => 'success', "message" => $message, "data" => $table);
   }
   echo json_encode($response);
}
