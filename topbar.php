<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <h4>Women Safety Legal Advisor</h4>
         </div>
         <div class="right_topbar">
            <div class="icon_info">
               <ul class="user_profile_dd">
                  <li>
                     <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" 
                     src="/legal_advisor/images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?= $_SESSION['name']; ?></span></a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= ROOT_DIR ?>logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</div>