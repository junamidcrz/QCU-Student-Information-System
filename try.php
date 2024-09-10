<?php
include('connect.php');

   $schedule_id = "";
   $section = "";
   $subject_id = "";
   $subj_code = "";
   $subj_description = "";
   $unit = "";
   $room ="";
   $day = "";
   $time = "";
   $fullname = "";
   $student_no = "";
   $section_id = "";


$db = mysqli_connect('localhost', 'root', '', 'qcusis');
$result = mysqli_query($db, "SELECT schedule.schedule_id, 
	section.section, 
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
    WHERE schedule.section_id = 7");
?>