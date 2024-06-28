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
                           <h2>Legal Query</h2>
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
                                          <th>Created by</th>
                                          <th>Case type</th>
                                          <th>Description</th>
                                          <th>Created at</th>
                                          <th>Hide contact </th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $sql = mysqli_query($conn, "SELECT legal_query.id, legal_query.created_by, legal_query.case_type,
                                        legal_query.description, legal_query.created_at, legal_query.hide_contact, legal_query.status,users.name
                                       FROM legal_query
                                       LEFT JOIN users ON legal_query.created_by = users.id order by legal_query.id desc");
                                       while ($row = mysqli_fetch_array($sql)) {
                                       ?>
                                          <tr>
                                             <td><?= $row['id']; ?></td>
                                             <td><?= $row['name']; ?></td>
                                             <td><?= $row['case_type']; ?></td>
                                             <td><?= $row['description']; ?></td>
                                             <td><?= $row['created_at']; ?></td>
                                             <td><?php
                                                   if ($row['hide_contact']) {
                                                      echo 'Yes';
                                                   } else {
                                                      echo 'No';
                                                   } ?>
                                             </td>
                                             <td>
                                                <?php
                                                if ($row['status']) {
                                                   echo 'Active';
                                                } else {
                                                   echo 'Deactive';
                                                } ?>
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