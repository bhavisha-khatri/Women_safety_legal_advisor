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
                           <h2>Legal Resource</h2>
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
                                          <th>Title</th>
                                          <th>Content</th>
                                          <th>Upload Date</th>
                                          <th>Author</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $sql = mysqli_query($conn, "SELECT legal_resource.id, legal_resource.title, legal_resource.content, legal_resource.upload_date, legal_resource.author, admin.name
                                       FROM legal_resource
                                       LEFT JOIN admin ON legal_resource.author = admin.id order by legal_resource.id desc");
                                                                           while ($row = mysqli_fetch_array($sql)) {
                                       ?>
                                          <tr>
                                             <td><?= $row['id']; ?></td>
                                             <td><?= $row['title']; ?></td>
                                             <td><?= $row['content']; ?></td>
                                             <td><?= $row['upload_date']; ?></td>
                                             <td><?= $row['name']; ?></td>
                                             <td><a href="add-legal-resource.php?id=<?= $row['id']; ?>">Edit</a> |
                                                <a class="delete-record" data-action="delete-legal-resource" data-id="<?= $row['id']; ?>" href="delete-legal-resource.php?id=<?= $row['id']; ?>">Delete</a>
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