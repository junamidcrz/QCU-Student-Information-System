<?php
//including the database connection file
include("connect.php");
 
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

// write delete query
$sql = "DELETE FROM faculty WHERE id = '$id'";

// Execute the query
$result = $conn->query($sql);

if ($result == TRUE) {
	echo "<script type='text/javascript'>alert('Faculty Information Deleted!'); window.location.href = 'admin/faculty.php';</script>";
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
    }
?>