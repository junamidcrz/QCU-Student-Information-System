<?php
  include('connect.php');

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT schedule.schedule_id, 
  section.section, 
  course.course_description, 
  subject.subj_description,
  room,
  day, 
  time, 
  faculty.fullname 
  FROM schedule JOIN section ON schedule.section_id = section.id 
  JOIN course ON schedule.course_id = course.id 
  JOIN subject ON schedule.subject_id = subject.id 
  JOIN faculty ON schedule.faculty_id = faculty.id 
  WHERE schedule_id={$id}";

  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: schedule.php');
    exit;
  }

  $row = $result->fetch_assoc();
?>