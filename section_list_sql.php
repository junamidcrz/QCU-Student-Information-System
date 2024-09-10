<?php
include('connect.php');

   $id =  "";
   $section = "";
   $campus = "";
   $course = "";
   $year = "";
   $semester = "";
   $school_year = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT * FROM section");
?>