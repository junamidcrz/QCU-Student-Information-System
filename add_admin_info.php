<?php 
   $username = $_POST['username'];
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
        $stmt = $conn->prepare("insert into admin_acc(username, password) values (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $execval = $stmt->execute();
    
    //after submitting the message will pop up
    echo "<script type='text/javascript'>alert('Admin Account Information Added Successfully!'); window.location.href = 'admin/accounts.php';</script>";
    $stmt->close();
    $conn->close();
  } 
?>