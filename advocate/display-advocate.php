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
                           <h2>Advocate</h2>
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
                                          <th>Mobile</th>
                                          <th>Street</th>
                                          <th>City</th>
                                          <th>Pincode</th>
                                          <th>State</th>
                                          <th>Photo</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $sql = mysqli_query($conn, "SELECT us.*,st.name as state_name,ci.name as city_name FROM advocate as us
                                        Left join states as st on us.state=st.id Left join cities as ci on us.city=ci.id ORDER BY id DESC");
                                       while ($row = mysqli_fetch_array($sql)) {
                                       ?>
                                          <tr>
                                             <td><?= $row['id']; ?></td>
                                             <td><?= $row['name']; ?></td>
                                             <td><?= $row['username']; ?></td>
                                             <td><?= $row['email_id']; ?></td>
                                             <td><?= $row['mobile']; ?></td>
                                             <td><?= $row['street']; ?></td>
                                             <td><?= $row['city_name']; ?></td>
                                             <td><?= $row['pincode']; ?></td>
                                             <td><?= $row['state_name']; ?></td>
                                             <td>
                                                <?php
                                                if ($row['photo']) {
                                                ?><img src="<?= "../" . $row['photo']; ?>" width="30px" height="30px"><?php
                                                   } else {
                                                      ?><img src="../images/extra.svg" width="50px" height="50px"><?php
                                                   }
                                              ?>
                                             </td>
                                             <td>
                                                <?php
                                                if ($row['status']) {
                                                   echo 'active';
                                                } else {
                                                   echo 'dactive';
                                                } ?>
                                             </td>
                                             <td><a href="add-advocate.php?id=<?= $row['id']; ?>">Edit</a> |
                                                <a class="delete-record" data-action="delete-advocate" data-id="<?= $row['id']; ?>" href="delete-advocate.php?id=<?= $row['id']; ?>">Delete</a>
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
<?php include '../script.php';?>
<script src="../js/ajax.js"></script>
</body>
</html>