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

    if( empty($_POST['section']) || empty($_POST['campus']) || empty($_POST['course_id']) || empty($_POST['year']) 
      || empty($_POST['semester']) || empty($_POST['school_year']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $section = $_POST['section'];
      $campus = $_POST['campus'];
      $course_id = $_POST['course_id'];
      $year = $_POST['year'];
      $semester = $_POST['semester'];
      $school_year = $_POST['school_year'];

      $sql = "UPDATE section SET 
              section='{$section}', 
              campus='{$campus}',
              course_id='{$course_id}',
              year='{$year}',
              semester='{$semester}',
              school_year='{$school_year}'
              WHERE id=" . $_POST['id'];

      if( $conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Section Information Updated!'); window.location.href = 'section.php';</script>";
      } else{
        echo "Error: There was an error while updating section information";
      }
    }
  }

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT * FROM section WHERE id={$id}";
  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: section.php');
    exit;
  }

  $row = $result->fetch_assoc();
  ?>

  <div class="content">

    <div class="form">
      <label class="title">Section Information</label> 
      <a href="section.php"><button name="cancel" class="cancel_btn">Cancel</button></a>
      <div class="gap"> </div>

        <form action="" method="POST">
          <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

          <div class="input-group">
            <label for="section" style="margin-right: 27px;">Section</label>
            <input type="text" id="section"  name="section" style="width: 37.5%;" value="<?php echo $row['section']; ?>">

            <label for="campus" style="margin-left: 34px; margin-right: 12px;">Campus</label>
            <select id="campus" name="campus">
              <option value="<?php echo $row['campus']; ?>"><?php echo $row['campus']; ?></option>
              <option value="San Bartolome" name="San Bartolome">San Bartolome</option>
              <option value="Batasan" name="Batasan">Batasan</option>
              <option value="San Francisco" name="San Francisco">San Francisco</option>
            </select>
          </div>

          <div class="input-group">
            <label for="course_id" style="margin-right: 28px;">Course</label>
            <select id="course_id" name="course_id" style="width: 37.5%;">
              <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
              <option value="BSIT" name="BSIT">BS Information Technology</option>
              <option value="BSEE" name="BSEE">BS Electronics Engineering</option>
              <option value="BSIE" name="BSIE">BS Industrial Engineering</option>
              <option value="BSE" name="BSE">BS Entrepreneurship</option>
              <option value="BSA" name="BSA">BS Accountancy</option>
            </select>

            <label for="year" style="margin-left: 35px;">Year</label>
            <select id="year" name="year" style="margin-left: 30px;">
              <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
              <option value="1st Year" name="1st Year">1st Year</option>
              <option value="2nd Year" name="2nd Year">2nd Year</option>
              <option value="3rd Year" name="3rd Year">3rd Year</option>
              <option value="4th Year" name="4th Year">4th Year</option>
              <option value="5th Year" name="5th Year">5th Year</option>
            </select>
          </div>

          <div class="input-group">
            <label for="semester" style="margin-right: 12px;">Semester</label>
            <select id="semester" name="semester" style="width: 37.5%;">
              <option alue="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
              <option value="1st" name="1st">1st</option>
              <option value="2nd" name="2nd">2nd</option>
            </select>

            <label for="school_year" style="margin-left: 35px;">S.Y.</label>
            <input type="text" id="school_year"  name="school_year" style="margin-left: 38px;" value="<?php echo $row['school_year']; ?>">
            </select>
          </div>

          <br>
          <input type="submit" name="update" class="edit_btn" value="Update">
          <a class="delete_btn" onclick="return confirm('Are you sure to delete this information?');" href="..\delete_section_info.php?id=<?php echo $row['id']; ?>">Delete</a>
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