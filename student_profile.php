<?php
include('connect.php');

$id ="";
$student_no = "";
$lastname = "";
$firstname = "";
$middlename = "";
$extname = "";
$sex = "";
$age = "";
$birthday = "";
$birthplace = "";
$religion = "";
$height = "";
$weight = "";
$email = "";
$contact_no = "";
$civil_status = "";
$course_id = "";
$course_code = "";
$course_description = "";
$section_id = "";
$section = "";
$campus = "";
$year = "";
$semester = "";
$school_year = "";
$add_unit_no = "";
$add_street = "";
$add_brgy = "";
$add_city = "";
$add_district = "";
$add_zip_code = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT *,
    course.course_code,
    course.course_description,
    section.section,
    section.campus,
    section.year,
    section.semester,
    section.school_year
	FROM students JOIN course ON students.course_id = course.id 
	JOIN section ON students.section_id = section.id 
	where student_no = '$user_check'");
?>