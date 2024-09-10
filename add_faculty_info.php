<?php 
   $fullname = $_POST['fullname'];
   $sex = $_POST['sex'];
   $age = $_POST['age'];
   $civil_status = $_POST['civil_status'];
   $email = $_POST['email'];
   $department = $_POST['department'];
   $employment_status = $_POST['employment_status'];

    
    //check connection if it's working
    $conn = new mysqli('localhost', 'root', '', 'qcusis');
    if($conn->connect_error){
    echo "$conn->connect_error";
    //failed to connect
    die("Connection Failed : ". $conn->connect_error);  
  } 
    //insert the data to database
    else {
        $stmt = $conn->prepare("insert into faculty(fullname, sex, age, civil_status, email, department, employment_status) values (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissss", $fullname, $sex, $age, $civil_status, $email, $department, $employment_status);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Faculty Information Added Successfully!'); window.location.href = 'admin/faculty.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>