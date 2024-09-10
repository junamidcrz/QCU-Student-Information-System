<?php include '..\admin_session.php'; ?>

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

  <div class="content">
   <div class="welcome">
        <p>List of Faculties</p>
        <a href="add_faculty.php"><button name="add_student" class="add_btn">Add Faculty</button></a>
        <hr>
    </div>

    <div class="tables">
      <center>
      <div class="schedule">
        <?php include ('..\faculty_list_sql.php');?>
      <table>
        <thead>
          <tr>
            <td>Faculty ID</td>
            <td>Full Name</td>
            <td>Sex</td>
            <td>Civil Status</td>
            <td>Email</td>
            <td>Department</td>
            <td> </td>
          </tr>
        </thead>

        <tbody>
          <?php while ($row=mysqli_fetch_array($result)){ ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fullname'];?></td>
            <td><?php echo $row['sex'];?></td>
            <td><?php echo $row['civil_status'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['department'];?></td>
            <td><a class ="view_btn" href="view_faculty_info.php?id=<?php echo $row['id']; ?>"><i class="far fa-eye"> View</i></a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table> 
       </div>
      </center>
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