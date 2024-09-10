<?php
    session_start();
	include('connect.php');
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 	
   
	$sql = "SELECT id FROM admin_acc WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
	$count = mysqli_num_rows($result);
     
	if ($count == 1) {
	$_SESSION['login_admin'] = $username;
	header("location: admin\portal.php");
	} else {
	    echo "<script type='text/javascript'>alert('Your Username or Password is wrong! '); window.location.href = 'admin/index.html';</script>";
	    exit();
	}
	}
    ?>