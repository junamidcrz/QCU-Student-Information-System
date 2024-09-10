<?php
include('connect.php');

   $schedule_id = "";
   $section = "";
   $campus = "";
   $course_code = "";
   $course_description = "";
   $subj_code = "";
   $subj_description = "";
   $room ="";
   $unit = "";
   $day = "";
   $time = "";
   $fullname = "";

$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT schedule.schedule_id, 
	section.section, 
	section.campus, 
	course.course_code, 
	course.course_description, 
	subject.subj_code, 
	subject.subj_description,
	subject.unit, 
	room,
	day, 
	time, 
	faculty.fullname 
	FROM schedule JOIN section ON schedule.section_id = section.id 
	JOIN course ON schedule.course_id = course.id 
	JOIN subject ON schedule.subject_id = subject.id 
	JOIN faculty ON schedule.faculty_id = faculty.id
	ORDER BY schedule_id");
?>