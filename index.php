<?php include './connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include './head.php'; ?>
<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <?php include './menu.php'; ?>
         <div id="content">
            <?php
            include './topbar.php';
            $advocateRegistered = $advocateActive = $usersRegistered = $usersActive = $problemsRegistered = $problemActive = $legalResource = "";
            $query = "SELECT 'advocate' AS table_name, COUNT(*) AS total_count, COUNT(CASE WHEN status = 1 THEN 1 END) AS active_count FROM advocate
             UNION ALL SELECT 'users' AS table_name, COUNT(*) AS total_count, COUNT(CASE WHEN status = 1 THEN 1 END) AS active_count FROM users
             UNION ALL SELECT 'legal_query' AS table_name, COUNT(*) AS total_count, COUNT(CASE WHEN status = 1 THEN 1 END) AS active_count FROM legal_query 
             UNION ALL SELECT 'legal_resource' AS table_name, COUNT(*) AS total_count, NULL AS active_count FROM legal_resource";
            $sql = mysqli_query($conn, $query);
            while ($row = $sql->fetch_assoc()) {
               if ($row['table_name'] == 'advocate') {
                  $advocateRegistered = $row['total_count'];
                  $advocateActive = $row['active_count'];
               } else if ($row['table_name'] == 'users') {
                  $usersRegistered = $row['total_count'];
                  $usersActive = $row['active_count'];
               } else if ($row['table_name'] == 'legal_query') {
                  $problemsRegistered = $row['total_count'];
                  $problemActive = $row['active_count'];
               } else if ($row['table_name'] == 'legal_resource') {
                  $legalResource = $row['total_count'];
               }
            }
            ?>
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column1 social_media_section">
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons fb margin_bottom_30">
                           <div class="social_icon">Advocates</div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong><?= $advocateRegistered; ?></strong></span><span>Registered</span>
                                 </li>
                                 <li>
                                    <span><strong><?= $advocateActive; ?></strong></span><span>Active</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons tw margin_bottom_30">
                           <div class="social_icon">Users</div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong><?= $usersRegistered; ?></strong></span><span>Registered</span>
                                 </li>
                                 <li>
                                    <span><strong><?= $usersActive; ?></strong></span><span>Active</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons linked margin_bottom_30">
                           <div class="social_icon">Legal Query</div>
                           <div class="social_cont">
                              <ul>
                                 <li>
                                    <span><strong><?= $problemsRegistered; ?></strong></span><span>Open</span>
                                 </li>
                                 <li>
                                    <span><strong><?= $problemActive; ?></strong></span><span>Resolved</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons google_p margin_bottom_30">
                           <div class="social_icon">
                              Resources
                           </div>
                           <div class="social_cont center">
                              <ul>
                                 <li style="width: 100%;">
                                    <span><strong><?= $legalResource; ?></strong></span>
                                    <span>Total Resources</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row column4 graph">
                     <div class="col-md-6">
                        <div class="dash_blog">
                           <div class="dash_blog_inner">
                              <div class="dash_head">
                                 <h3><span><i class="fa fa-book"></i> Resources</span></h3>
                              </div>
                              <div class="task_list_main">
                                 <ul class="task_list">
                                    <?php
                                    $sql = mysqli_query($conn, "select * from legal_resource order by id desc Limit 5");
                                    while ($row = $sql->fetch_assoc()) {
                                       $createdDate = strtotime($row['upload_date']);
                                       $date = date('Y-m-d H:i:s', $createdDate);
                                    ?>
                                       <li><a href="#"><?= $row['title']; ?></a><br><strong><?= $date; ?></strong></li>
                                    <?php
                                    }
                                    ?>
                                 </ul>
                              </div>
                              <div class="read_more">
                                 <div class="center"><a class="main_bt read_bt" href="legal-resource/display-legal-resource.php">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="dash_blog">
                           <div class="dash_blog_inner">
                              <div class="dash_head">
                                 <h3><span><i class="fa fa-comments-o"></i> Legal Query</span></h3>
                              </div>
                              <div class="msg_list_main">
                                 <ul class="msg_list">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT legal_query.id, legal_query.created_by, legal_query.case_type, legal_query.description, legal_query.created_at,
                                     legal_query.hide_contact, legal_query.status,users.name FROM legal_query LEFT JOIN users ON legal_query.created_by = users.id order by legal_query.id desc Limit 5");
                                    while ($row = $sql->fetch_assoc()) {
                                    ?>
                                       <li>
                                          <span>
                                             <span class="name_user"><?= $row['name']; ?></span>
                                             <span class="msg_user"><?= $row['description']; ?></span>
                                             <span class="time_ago"><?= $row['created_at']; ?></span>
                                          </span>
                                       </li>
                                    <?php
                                    }
                                    ?>
                                 </ul>
                              </div>
                              <div class="read_more">
                                 <div class="center"><a class="main_bt read_bt" href="legal-query/display-legal-query.php">Read More</a></div>
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
<?php include './script.php'; ?>
</body>
</html>