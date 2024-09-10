<?php
include('connect.php');

   $id =  "";
   $fullname = "";
   $sex = "";
   $age = "";
   $civil_status = "";
   $email = "";
   $department = "";
   $employment_status = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT * FROM faculty");
?>