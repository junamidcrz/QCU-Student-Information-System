<?php
include('connect.php');

   $id =  "";
   $username = "";
   $password = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT * FROM admin_acc");
?>