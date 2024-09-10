<?php 

   $section_id =  $_POST['section_id'];
   $course_id = $_POST['course_id'];
   $subject_id = $_POST['subject_id'];
   $room = $_POST['room'];
   $day = $_POST['day'];
   $time = $_POST['time'];
   $faculty_id = $_POST['faculty_id'];

    
    //check connection if it's working
    $conn = new mysqli('localhost', 'root', '', 'qcusis');
    if($conn->connect_error){
    echo "$conn->connect_error";
    //failed to connect
    die("Connection Failed : ". $conn->connect_error);  
  } 
    //insert the data to database
    else {
        $stmt = $conn->prepare("insert into schedule(section_id, course_id, subject_id, room, day, time, faculty_id) values (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisssi", $section_id, $course_id, $subject_id, $room, $day, $time, $faculty_id);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Schedule Information Added Successfully!'); window.location.href = 'admin/schedule.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>