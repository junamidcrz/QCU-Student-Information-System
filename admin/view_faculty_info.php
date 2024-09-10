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

    if( empty($_POST['fullname']) || empty($_POST['sex']) || empty($_POST['age']) || empty($_POST['civil_status']) 
      || empty($_POST['email']) || empty($_POST['department']) || empty($_POST['employment_status']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $fullname = $_POST['fullname'];
      $sex = $_POST['sex'];
      $age = $_POST['age'];
      $civil_status = $_POST['civil_status'];
      $email = $_POST['email'];
      $department = $_POST['department'];
      $employment_status = $_POST['employment_status'];

      $sql = "UPDATE faculty SET 
              fullname='{$fullname}', 
              sex='{$sex}',
              age='{$age}', 
              civil_status='{$civil_status}', 
              email='{$email}', 
              department='{$department}', 
              employment_status='{$employment_status}'
              WHERE id=" . $_POST['id'];

      if( $conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Faculty Information Updated!'); window.location.href = 'faculty.php';</script>";
      } else{
        echo "Error: There was an error while updating faculty information";
      }
    }
  }

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT * FROM faculty WHERE id={$id}";
  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: faculty.php');
    exit;
  }

  $row = $result->fetch_assoc();
  ?>

  <div class="content">

    <div class="form">
      <label class="title">Faculty Information</label> 
      <a href="faculty.php"><button name="cancel" class="cancel_btn">Back</button></a>
      <div class="gap"> </div>

        <form action="" method="POST">
          <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

          <div class="input-group">
            <label for="fullname" style="margin-right: 12px;">Full Name</label>
            <input type="text" id="fullname"  name="fullname" style="width: 37.5%;" value="<?php echo $row['fullname']; ?>">

            <label for="gender" style="margin-left: 15px;">Gender</label>
            <select id="sex" name="sex" style="margin-left: 35px;">
              <option value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
              <option value="Female" name="Female">Female</option>
              <option value="Male" name="Male">Male</option>
            </select>
          </div>

          <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" style="width: 42.5%;" value="<?php echo $row['email']; ?>">

            <label for="civil_status" style="margin-left: 14px;">Civil Status</label>
            <select id="civil_status" name="civil_status" style="margin-left: 11px;">
              <option value="<?php echo $row['civil_status']; ?>"><?php echo $row['civil_status']; ?></option>
              <option value="Single" name="Single">Single</option>
              <option value="Married" name="Married">Married</option>
            </select>
          </div>

          <div class="input-group">
             <label for="department">Department</label>
            <select id="department" name="department" style="margin-left: 14px; width: 33%;">
              <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
              <option value="Department of Information Technology" name="Department of Information Technology">Department of Information Technology</option>
              <option value="Department of Engineering" name="Department of Engineering">Department of Engineering</option>
              <option value="Department of Entrepreneurship" name="Department of Entrepreneurship">Department of Entrepreneurship</option>
              <option value="Department of Accountancy" name="Department of Accountancy">Department of Accountancy</option>
              <option value="Department of Social Science" name="Department of Social Science">Department of Social Science</option>
            </select>
            
            <label for="age" style="margin-left: 15px;">Age</label>
            <input type="text" id="age"  name="age" placeholder="input numbers only" style="margin-left: 60px;" value="<?php echo $row['age']; ?>">
          </div>
        
          <div class="input-group">
            <label for="employment_status">Employment Status</label>
            <select id="employment_status" name="employment_status" style="margin-left: 14px; width: 25%;">
              <option value="<?php echo $row['employment_status']; ?>"><?php echo $row['civil_status']; ?></option>
              <option value="Full-time" name="Full-time">Full-time</option>
              <option value="Part-time" name="Part-time">Part-time</option>
              <option value="Internship" name="Internship">Internship</option>
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