<?php
   include('connect.php');
   session_start();
   
   $admin_check = $_SESSION['login_admin'];
   
   $ses_sql = mysqli_query($conn,"select username from admin_acc where username = '$admin_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_admin'])){
      header("location: admin\index.html");
      die();
   }   
?>