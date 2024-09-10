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

  <div class="content">

    <div class="form">
      <label class="title">Add New Schedule</label> 
      <a href="schedule.php"><button name="cancel" class="cancel_btn">Cancel</button></a>
      <div class="gap"> </div>

        <form action="..\add_schedule_info.php" method="POST" autocomplete="off">

          <div class="input-group">
            <?php include ('..\section_list_sql.php');?>
            <label for="section_id">Section</label>
            <select id="section_id" name="section_id" style="margin-left: 12px;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="input-group">
            <?php include ('..\course_list_sql.php');?>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" style="margin-left: 12px; width: 70%;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['course_description']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="input-group">
            <?php include ('..\subject_list_sql.php');?>
            <label for="subject_id">Subject</label>
            <select id="subject_id" name="subject_id" style="margin-left: 11px; width: 70%;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['subj_description']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="input-group">
            <label for="day" style="margin-right: 35px;">Day</label>
            <select id="day" name="day" style="margin-left: 10px; width: 25%;" required>
              <option disabled selected>Please Select</option>
              <option value="M" name="M">Monday</option>
              <option value="T" name="T">Tuesday</option>
              <option value="W" name="W">Wednesday</option>
              <option value="TH" name="TH">Thursday</option>
              <option value="F" name="F">Friday</option>
              <option value="S" name="S">Saturday</option>
            </select>

            <label for="time" style="margin-left: 30px;">Time</label>
            <input type="text" id="time" name="time" style="margin-left: 12px; width: 30.5%;" placeholder="Ex: 7:00AM-9:00AM" required>
          </div>

          <div class="input-group">
            <label for="room">Room</label>
            <input type="text" id="room" name="room" style="margin-left: 22px; width: 25%;" placeholder="Ex: IB106a" required>

            <?php include ('..\faculty_list_sql.php');?>
            <label for="faculty_id" style="margin-left: 26px;">Faculty</label>
            <select id="faculty_id" name="faculty_id" style="width: 30.5%;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
              <?php } ?>
            </select>
          </div>

          <br>
          <br>
          <input type="submit" name="add_schedule" class="add2_btn" value="Add Schedule">
        </form>
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