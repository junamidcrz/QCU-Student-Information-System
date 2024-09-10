<?php 
  include("..\connect.php");
  
  if(isset($_POST['update'])){

    if( empty($_POST['section_id']) || empty($_POST['course_id']) || empty($_POST['subject_id'])
      || empty($_POST['day']) || empty($_POST['time']) || empty($_POST['faculty_id']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $section_id =  $_POST['section_id'];
      $course_id = $_POST['course_id'];
      $subject_id = $_POST['subject_id'];
      $day = $_POST['day'];
      $time = $_POST['time'];
      $faculty_id = $_POST['faculty_id'];

      $sql = "UPDATE schedule SET 
              section_id='{$section_id}',
              course_id='{$course_id}',
              subject_id='{$subject_id}';
              day='{$day}',
              time='{$time}',
              faculty_id='{$faculty_id}'
              WHERE schedule_id=" . $_POST['schedule_id'];

      if($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Schedule Information Updated!'); window.location.href = 'schedule.php';</script>";
      } else{
        echo "Error: There was an error while updating schedule information";
      }
    }
  }
?>
