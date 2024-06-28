<?php
include './connection.php';
session_start();

if (isset($_SESSION["is_login"]) && $_SESSION["is_login"] === true) {
   header("location:index.php");
}

if ($_POST) {

   $username = $_POST['username'];
   $password = $_POST['password'];
   $sql = mysqli_query($conn, "select * from admin where username = '{$username}'and password = '{$password}'");

   if ($sql->num_rows > 0) {
      $row = $sql->fetch_assoc();
      $status = $row['status'];
      if ($status == 0) {
         echo "<script>alert('Admin is Deactive')</script>";
      } else {
         $_SESSION["is_login"] = true;
         $_SESSION["username"] = $username;
         $_SESSION["name"] = $row['name'];
         $_SESSION["id"] = $row['id'];
         header("location:index.php");
      }
   } else {
      echo "<script>alert('Please enter correct username/password!')</script>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>Login | Women Safety Legal Advisor</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/style.css" />
   <link rel="stylesheet" href="css/responsive.css" />
   <link rel="stylesheet" href="css/colors.css" />
   <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <h2 style="color: #fff; padding: 30px 0;">Women Safety Legal Advisor</h2>
                  </div>
               </div>
               <div class="login_form">
                  <form method="post">
                     <fieldset>
                        <div class="field">
                           <label class="label_field">Username</label>
                           <input type="username" name="username" placeholder="Username" />
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt">Sing In</button>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>