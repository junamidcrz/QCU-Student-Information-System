<?php
    session_start();
	include('connect.php');
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_no = mysqli_real_escape_string($conn,$_POST['student_no']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 	
   
	$sql = "SELECT id FROM students WHERE student_no = '$student_no' and password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
	$count = mysqli_num_rows($result);
     
	if ($count == 1) {
	$_SESSION['login_student'] = $student_no;
	header("location: student/portal.php");
	} else {
	    echo "<script type='text/javascript'>alert('Your Student Number or Password is wrong! '); window.location.href = 'student/index.html';</script>";
	    exit();
	}
	}
?>
