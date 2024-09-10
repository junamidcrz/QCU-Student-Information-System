<?php include ('..\student_session.php'); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> QCU SIS Portal </title>
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
      <a href="..\student_logout.php" class="logout_btn">Logout</a>
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
    <a href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
    <a href="schedule.php"><i class="far fa-calendar-alt"></i><span>Schedule</span></a>
    <a href="grades.php"><i class="fas fa-book-open"></i><span>Grades</span></a>
    <a href="password.php"><i class="fas fa-sliders-h"></i><span>Password</span></a>
  </div>
  </div>
  <!--mobile navigation end-->
  
  
  <!--sidebar start-->

  <div class="sidebar">
    <div class="profile_info">
      <img src="..\assets/img/avatar.png" class="profile_image" alt="">
      <?php echo $login_session = $row['student_no']; ?>
    </div>
    <a href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
    <a href="schedule.php"><i class="far fa-calendar-alt"></i><span>Schedule</span></a>
    <a href="grades.php"><i class="fas fa-book-open"></i><span>Grades</span></a>
    <a href="password.php"><i class="fas fa-sliders-h"></i><span>Password</span></a>
  </div>

  <!--sidebar end-->

  <div class="content">
   <div class="welcome">
    <?php include ('..\student_profile.php');?>

    <?php while ($row=mysqli_fetch_array($result)){ ?>

        <p>Welcome, <?php echo $row['firstname'];?> <?php echo $row['lastname'];?> (<?php echo $login_session = $row['student_no']; ?>)</p>
    
        <table>
        <tr>
          <td><span>Course: <?php echo $row['course_description'];?></span></td>
          <td><span>Semester: <?php echo $row['semester'];?></span></td>
          <td><span>SY:  <?php echo $row['school_year'];?></span></td>
          <td><span>Section:  <?php echo $row['section'];?></span></td>
        </tr>
      </table>
      <?php } ?>
        <hr>
    </div>

    <?php include ('..\try.php');?>

    

    <div class="tables">
      <center>
      <div class="schedule">
      <table>
        <thead>
          <tr>
            <td>Section</td>
            <td>Subject Code</td>
            <td>Description</td>
            <td>Room</td>
            <td>Units</td>
            <td>Day</td>
            <td>Time</td>
            <td>Faculty</td>
          </tr>
        </thead>
        <?php while ($row=mysqli_fetch_array($result)){ ?>
        <tbody>
          <tr>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['subj_code'];?></td>
            <td><?php echo $row['subj_description'];?></td>
            <td><?php echo $row['room'];?></td>
            <td><?php echo $row['unit'];?></td> 
            <td><?php echo $row['day'];?></td> 
            <td><?php echo $row['time'];?></td>
            <td><?php echo $row['fullname'];?></td>
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