<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_student'];
   
   $ses_sql = mysqli_query($conn,"select student_no from students where student_no = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['student_no'];
   
   if(!isset($_SESSION['login_student'])){
      header("location: student/index.html");
      die();
   }   
?>