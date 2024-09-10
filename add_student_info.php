<?php 

   $student_no =  $_POST['student_no'];
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $middlename = $_POST['middlename'];
   $extname = $_POST['extname'];
   $sex = $_POST['sex'];
   $age = $_POST['age'];
   $birthday = $_POST['birthday'];
   $birthplace = $_POST['birthplace'];
   $religion = $_POST['religion'];
   $height = $_POST['height'];
   $weight = $_POST['weight'];
   $email = $_POST['email'];
   $contact_no = $_POST['contact_no'];
   $civil_status = $_POST['civil_status'];
   $course_id = $_POST['course_id'];
   $section_id = $_POST['section_id'];
   $add_unit_no = $_POST['add_unit_no'];      
   $add_street = $_POST['add_street'];
   $add_brgy = $_POST['add_brgy'];
   $add_city = $_POST['add_city'];
   $add_district = $_POST['add_district'];
   $add_zip_code = $_POST['add_zip_code'];
   $password = $_POST['password'];
    
    //check connection if it's working
    $conn = new mysqli('localhost', 'root', '', 'qcusis');
    if($conn->connect_error){
    echo "$conn->connect_error";
    //failed to connect
    die("Connection Failed : ". $conn->connect_error);  
  } 
    //insert the data to database
    else {
        $stmt = $conn->prepare("insert into students(student_no, lastname, firstname, middlename, extname, sex, age, birthday, birthplace,
          religion, height, weight, email, contact_no, civil_status, course_id, section_id, password, add_unit_no, add_street, add_brgy,
          add_city, add_district, add_zip_code) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssissssssssiisissssi", $student_no, $lastname, $firstname, $middlename, $extname, $sex, $age, $birthday, $birthplace, 
          $religion, $height, $weight, $email, $contact_no, $civil_status, $course_id, $section_id, $password, $add_unit_no, $add_street, $add_brgy, 
          $add_city, $add_district, $add_zip_code);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Student Information Added Successfully!'); window.location.href = 'admin/students.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>