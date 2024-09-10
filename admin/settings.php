<?php include ('..\admin_session.php');?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> QCU SIS Admin Portal </title>
  <script src="https://kit.fontawesome.com/b0811c54d0.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"charset="utf-8"></script>
  <link rel="stylesheet" href="..\assets/css/portal.css">
  <link rel="stylesheet" href="..\assets/css/main.css">
</head>
<body>
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="logo">
     <img src="..\assets/img/qcu_logo.png" class="logo">
    </div>
    <div class="left_area">
      <h3> Quezon City University </h3>
    </div>
    <div class="right_area">
      <a href="..\admin_logout.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  
  <!--mobile navigation start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="..\assets/img/avatar.png" class="profile_image" alt=""> 
    <i class="fas fa-bars nav_btn"></i>
    </div>
  <div class="mobile_nav_items">
    <a href="students.php"><i class="fas fa-user"></i><span>Student</span></a>
    <a href="faculty.php"><i class="fas fa-users"></i><span>Faculty</span></a>
    <a href="subjects.php"><i class="fas fa-book-open"></i><span>Subject</span></a>
    <a href="section.php"><i class="fas fa-folder-open"></i><span>Section</span></a>
    <a href="schedule.php"><i class="far fa-calendar-alt"></i><span>Schedule</span></a>
    <a href="accounts.php"><i class="fas fa-users-cog"></i><span>Accounts</span></a>
    <a href="settings.php"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
  </div>
  </div>
  <!--mobile navigation end-->
  
  
  <!--sidebar start-->

  <div class="sidebar">
    <div class="profile_info">
      <img src="..\assets/img/avatar.png" class="profile_image" alt="">
      <?php echo $login_session = $row['username']; ?>
    </div>
    <a href="students.php"><i class="fas fa-user"></i><span>Student</span></a>
    <a href="faculty.php"><i class="fas fa-users"></i><span>Faculty</span></a>
    <a href="subjects.php"><i class="fas fa-book-open"></i><span>Subject</span></a>
    <a href="section.php"><i class="fas fa-folder-open"></i><span>Section</span></a>
    <a href="schedule.php"><i class="far fa-calendar-alt"></i><span>Schedule</span></a>
    <a href="accounts.php"><i class="fas fa-users-cog"></i><span>Accounts</span></a>
    <a href="settings.php"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
  </div>
  <!--sidebar end-->
  <?php include ('..\admin_list_sql.php');?>

  <?php while ($row=mysqli_fetch_array($result)){ ?>

  <div class="content">
   <div class="welcome">
        <p>Welcome, <?php echo $row['username'];?> !</p>
        <a href="portal.php"><button name="cancel" class="add_btn">Cancel</button></a>
        <hr>
    </div>
  <?php } ?>
    

    <div class="tables">
      <h1>Change Password</h1>
  
        <?php 
        include("..\connect.php");
  
        if(isset($_POST['update'])){
        $newPassword =($_POST['newPassword']);
        $confirmPassword =($_POST['confirmPassword']);

        if ($newPassword != $confirmPassword) {
          echo "<script type='text/javascript'>alert('Passwords do not match!'); window.location.href = 'settings.php';</script>";
        }
      
        //inserting details on the database
        else{
          $sql = "UPDATE admin_acc SET 
            password='{$newPassword}'
            WHERE username='{$admin_check}'";
      
        if( $conn->query($sql) === TRUE){
          echo "<script type='text/javascript'>alert('Password Updated!'); window.location.href = 'settings.php';</script>";
        } else{
          echo "Error: There was an error while updating password";
        }
      }
    }
    ?>


      <div class="password">
        <form action="" method="POST">
        <table>
          <tr>
            <td><label>Old Password: <label></td>
            <td><input type="password" id="currentPassword" name="currentPassword"></span></td>
          </tr>
          <tr>
            <td><label>New Password: <label></td>
            <td><input type="password" id="newPassword" name="newPassword"></span></td>
          </tr>
          <tr>
            <td><label>Confirm Password: <label></td>
            <td><input type="password" id="confirmPassword" name="confirmPassword"></span></td>
          </tr>
        </table>

        <input type="submit" name="update" value="Update">

      </form>
      </div>
  </div>
  <br><br>

  <div class="database">
        <hr>
        <table>
          <tr>
            <td colspan = "2"><p>Database Tools</p></td>
          </td>
          <tr>
          <td><a class="database_btn" style="background-color: #1858cd;" onclick="return confirm('Are you sure on backing up the database?');" href="..\database_backup.php" > <i class="fas fa-archive"></i> Backup Database</a>
          <td><a class="database_btn" style="background-color: #00b359;" onclick="return confirm('Are you sure on recovering the database?');" href="..\database_recovery.php" ><i class="fas fa-history"></i> Recover Database</a>
        </tr>
       </table>
  </div>
</div>
  
  <script type="text/javascript">
    $(document).ready(function(){
		$('.nav_btn').click(function(){
			$('.mobile_nav_items').toggleClass('active');
		});
	});
  </script>

</body>
</html>