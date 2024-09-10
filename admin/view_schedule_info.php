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

  <?php 
  include("..\connect.php");
  
  if(isset($_POST['update'])){

    if( empty($_POST['section_id']) || empty($_POST['course_id']) || empty($_POST['subject_id']) || empty($_POST['unit']) 
      || empty($_POST['day']) || empty($_POST['time']) || empty($_POST['faculty_id']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $section_id =  $_POST['section_id'];
      $course_id = $_POST['course_id'];
      $subject_id = $_POST['subject_id'];
      $day = $_POST['day'];
      $time = $_POST['time'];
      $faculty_id = $_POST['faculty_id'];

      $sql = "UPDATE schedule SET 
              section_id='{$section_id}',
              course_id='{$course_id}',
              subject_id='{$subject_id}',
              day='{$day}',
              time='{$time}',
              faculty_id='{$faculty_id}'
              WHERE schedule_id=" . $_POST['schedule_id'];

      if($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Schedule Information Updated!'); window.location.href = 'schedule.php';</script>";
      } else{
        echo "Error: There was an error while updating schedule information";
      }
    }
  }

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT schedule.schedule_id,
  section.section, 
  course.course_description, 
  subject.subj_description,
  room,
  day, 
  time, 
  faculty.fullname 
  FROM schedule JOIN section ON schedule.section_id = section.id 
  JOIN course ON schedule.course_id = course.id 
  JOIN subject ON schedule.subject_id = subject.id 
  JOIN faculty ON schedule.faculty_id = faculty.id 
  WHERE schedule_id={$id}";

  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: schedule.php');
    exit;
  }

  $row = $result->fetch_assoc();
  ?>

  <div class="content">

    <div class="form">
      <label class="title">Schedule Information</label> 
      <a href="schedule.php"><button name="cancel" class="cancel_btn">Cancel</button></a>
      <div class="gap"> </div>
      <input type="hidden" value="<?php echo $row['schedule_id']; ?>" name="schedule_id">

        <form action="" method="POST">
          <div class="input-group">
            <?php include ('..\schedule_fetch_data.php');?>
            <label for="section_id">Section</label>
            <select id="section_id" name="section_id" style="margin-left: 12px;"required>
              <option value="<?php echo $row['section_id']; ?>"><?php echo $row['section']; ?></option>

              <?php include ('..\section_list_sql.php');?>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
              <?php } ?>
            </select>     
          </div>

          <div class="input-group">
            <?php include ('..\schedule_fetch_data.php');?>
            <label for="course_id">Course</label>
             <select id="course_id" name="course_id" style="margin-left: 12px; width: 70%;"required>
              <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_description']; ?></option>

              <?php include ('..\course_list_sql.php');?>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['course_description']; ?></option>
              <?php } ?>
            </select>          
          </div>

          <div class="input-group">
            <?php include ('..\schedule_fetch_data.php');?>
            <label for="subject_id">Subject</label>
            <select id="subject_id" name="subject_id" style="margin-left: 11px; width: 70%;"required>
              <option value="<?php echo $row['subj_description']; ?>"><?php echo $row['subj_description']; ?></option>

              <?php include ('..\subject_list_sql.php');?>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['subj_description']; ?></option>
              <?php } ?>
              </select>
          </div>

          <div class="input-group">
            <?php include ('..\schedule_fetch_data.php');?>
            <label for="day" style="margin-right: 35px;">Day</label>
             <select id="day" name="day" style="margin-left: 10px; width: 25%;" required>
              <option value="<?php echo $row['day']; ?>"><?php echo $row['day']; ?></option>
              <option value="M" name="M">Monday</option>
              <option value="T" name="T">Tuesday</option>
              <option value="W" name="W">Wednesday</option>
              <option value="TH" name="TH">Thursday</option>
              <option value="F" name="F">Friday</option>
              <option value="S" name="S">Saturday</option>
            </select>

            <label for="time" style="margin-left: 30px;">Time</label>
            <?php include ('..\schedule_fetch_data.php');?>
            <input type="text" id="time" name="time" style="margin-left: 12px; width: 30.5%;" value="<?php echo $row['time']; ?>">
          </div>

          <div class="input-group">
            <?php include ('..\schedule_fetch_data.php');?>
            <label for="room">Room</label>
            <input type="text" id="room" name="room" style="margin-left: 22px; width: 25%;" value="<?php echo $row['room']; ?>">

            <label for="faculty_id" style="margin-left: 26px;">Faculty</label>
            <select id="faculty_id" name="faculty_id" style="width: 30.5%;"required>
              <option value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>

              <?php include ('..\faculty_list_sql.php');?>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
              <?php } ?>
            </select>
          </div>

          <br>
          <input type="submit" name="" class="edit_btn" value="Update">
          <?php include ('..\schedule_fetch_data.php');?>
          <input type="hidden" value="<?php echo $row['schedule_id']; ?>" name="id">
          <a class="delete_btn" onclick="return confirm('Are you sure to delete this information?');" href="..\delete_schedule_info.php?id=<?php echo $row['schedule_id']; ?>">Delete</a>
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