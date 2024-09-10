<?php 
   $section = $_POST['section'];
   $campus = $_POST['campus'];
   $course_id = $_POST['course_id'];
   $year = $_POST['year'];
   $semester = $_POST['semester'];
   $school_year = $_POST['school_year'];

    //check connection if it's working
    $conn = new mysqli('localhost', 'root', '', 'qcusis');
    if($conn->connect_error){
    echo "$conn->connect_error";
    //failed to connect
    die("Connection Failed : ". $conn->connect_error);  
  } 
    //insert the data to database
    else {
        $stmt = $conn->prepare("insert into section(section, campus, course_id, year, semester, school_year) values (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $section, $campus, $course_id, $year, $semester, $school_year);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Section Information Added Successfully!'); window.location.href = 'admin/section.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>