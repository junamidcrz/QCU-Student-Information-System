<?php 
   $subj_code = $_POST['subj_code'];
   $subj_description = $_POST['subj_description'];
   $unit = $_POST['unit'];
   $course_id = $_POST['course_id'];

    
    //check connection if it's working
    $conn = new mysqli('localhost', 'root', '', 'qcusis');
    if($conn->connect_error){
    echo "$conn->connect_error";
    //failed to connect
    die("Connection Failed : ". $conn->connect_error);  
  } 
    //insert the data to database
    else {
        $stmt = $conn->prepare("insert into subject(subj_code, subj_description, unit, course_id) values (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $subj_code, $subj_description, $unit, $course_id);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Subject Information Added Successfully!'); window.location.href = 'admin/subjects.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>