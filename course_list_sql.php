<?php
include('connect.php');
   $id = "";
   $course_code = "";
   $course_description = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT * FROM course");
?>