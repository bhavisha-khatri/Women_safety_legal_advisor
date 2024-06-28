<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="index.html"><img class="logo_icon img-responsive" src="/legal_advisor/images/logo/logo_icon.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img class="img-responsive" src="/legal_advisor/images/layout_img/user_img.jpg" alt="#" /></div>
            <div class="user_info">
               <h6><?php echo "Hello, " . $_SESSION['username']; ?></h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
      <div class="sidebar_blog_2">
         <h4>General</h4>
         <ul class="list-unstyled components">
            <li class="active">
               <a href="<?= ROOT_DIR ?>index.php" aria-expanded="false"><span>Dashboard</span></a>
            </li>
            <li>
               <a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Admin</span></a>
               <ul class="collapse list-unstyled" id="admin">
                  <li><a href="<?= ROOT_DIR ?>admin/display-admin.php"><span>Admin List</span></a></li>
                  <li><a href="<?= ROOT_DIR ?>admin/add-admin.php"><span>Add Admin</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#advocate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Advocate</span></a>
               <ul class="collapse list-unstyled" id="advocate">
                  <li><a href="<?= ROOT_DIR ?>advocate/display-advocate.php"><span>Advocate List</span></a></li>
                  <li><a href="<?= ROOT_DIR ?>advocate/add-advocate.php"><span>Add Advocate</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Users</span></a>
               <ul class="collapse list-unstyled" id="users">
                  <li><a href="<?= ROOT_DIR ?>users/display-users.php"><span>User List</span></a></li>
                  <li><a href="<?= ROOT_DIR ?>users/add-users.php"><span>Add User</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#legal-query" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Leagal Query</span></a>
               <ul class="collapse list-unstyled" id="legal-query">
                  <li><a href="<?= ROOT_DIR ?>legal-query/display-legal-query.php"><span>Leagal Query List</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#legal-resource" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Legal Resource</span></a>
               <ul class="collapse list-unstyled" id="legal-resource">
                  <li><a href="<?= ROOT_DIR ?>legal-resource/display-legal-resource.php"><span>Legal Resource List</span></a></li>
                  <li><a href="<?= ROOT_DIR ?>legal-resource/add-legal-resource.php"><span>Add Legal Resource</span></a></li>
               </ul>
            </li>
         </ul>
      </div>
</nav>