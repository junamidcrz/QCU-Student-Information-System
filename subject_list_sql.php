<?php
include('connect.php');

   $subj_code = "";
   $subj_description = "";
   $unit = "";
   $course_id = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT * FROM subject");
?>

