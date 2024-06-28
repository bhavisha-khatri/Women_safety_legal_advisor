<!DOCTYPE html>
<html>
<?php
include '../connection.php';
include '../head.php';
?>
<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <?php
         include '../menu.php';
         ?>
         <div id="content">
            <?php
            include '../topbar.php';
            ?>
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Admin</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                           <div class="row column1 padding_infor_info">

                              <div class="container mt-3">
                                 <div class="message"></div>
                                 <table id="example" class="table table-striped" style="width:100%">
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
                                    <tbody>
                                       <?php
                                       $sql = mysqli_query($conn, "SELECT * FROM admin ORDER BY id DESC");
                                       while ($row = mysqli_fetch_array($sql)) {
                                       ?>
                                          <tr>
                                             <td><?= $row['id']; ?></td>
                                             <td><?= $row['name']; ?></td>
                                             <td><?= $row['username']; ?></td>
                                             <td><?= $row['email_id']; ?></td>
                                             <td>
                                                <?php
                                                if ($row['status']) {
                                                   echo 'Active';
                                                } else {
                                                   echo 'Deactive';
                                                } ?>

                                             </td>
                                             <td><a href="add-admin.php?id=<?= $row['id']; ?>">Edit</a> |
                                                <a class="delete-record" data-action="delete-admin" data-id="<?= $row['id']; ?>" href="delete-admin.php?id=<?= $row['id']; ?>">Delete</a>
                                             </td>
                                          </tr>
                                       <?php
                                       }
                                       ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   include '../script.php';
   ?>
   <script src="../js/ajax.js"></script>
</body>
</html>