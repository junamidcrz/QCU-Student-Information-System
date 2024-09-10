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

<style>
  .content {
  height: auto;
  }
</style>

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
      <label class="title">Add New Student</label> 
      <a href="students.php"><button name="cancel" class="cancel_btn">Cancel</button></a>
      <div class="gap"> </div>

        <form action="..\add_student_info.php" method="POST">

          <label class="intro">Personal Information</label> 
          <br><br>
          <div class="input-group">
            <label for="lastname" style="margin-right: 28px;">Last Name</label>
            <input type="text" id="lastname"  name="lastname" required>

            <label for="firstname" style="margin-left: 28px; margin-right: 18px;">First Name</label>
            <input type="text" id="firstname"  name="firstname" required><br>
          </div>

           <div class="input-group">
            <label for="middlename">Middle Name</label>
            <input type="text" id="middlename"  name="middlename" required>

            <label for="extname" style="margin-left: 28px; margin-right: 23px;">Ext. Name</label>
            <input type="text" id="extname"  name="extname" required><br>
          </div>

          <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" style="width: 38.5%;"required>

            <label for="student_no" style="margin-left: 28px; margin-right: 12px;">Student No.</label>
            <input type="text" id="student_no"  name="student_no" placeholder="Ex: 00-0000" required>
          </div>

          <div class="input-group">
            <?php include ('..\course_list_sql.php');?>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" style="margin-left: 12px; width: 34.5%;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['course_description']; ?></option>
              <?php } ?>
            </select>

            <?php include ('..\section_list_sql.php');?>
            <label for="section_id" style="margin-left: 30px; margin-right: 28px;">Section</label>
            <select id="section_id" name="section_id" style="margin-left: 12px;"required>
              <option disabled selected>Please Select</option>
              <?php while ($row=mysqli_fetch_array($result)){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
              <?php } ?>
            </select>
          </div>

          <br>
          <hr>
          <br>

          <div class="input-group">
            <label for="birthday">Birthday</label>
            <input type="text" id="birthday" name="birthday" placeholder="Ex: 12/25/2000" style="margin-left: 22px; width: 32.5%;" required>
            
            <label for="age" style="margin-left: 30px;">Age</label>
            <input type="text" id="age"  name="age" placeholder="input numbers only" style="margin-left: 50px;" required>
          </div>

          <div class="input-group">
            <label for="birthplace">Birth Place</label>
            <input type="text" id="birthplace" name="birthplace" style="margin-left: 8px; width: 32.5%;" required>
            
            <label for="sex" style="margin-left: 30px;">Gender</label>
            <select id="sex" name="sex" style="margin-left: 25px;" required>
              <option disabled selected>Please Select</option>
              <option value="Female" name="Female">Female</option>
              <option value="Male" name="Male">Male</option>
            </select>
          </div>

          <div class="input-group">
            <label for="height">Height(cm)</label>
            <input type="text" id="height" name="height"style="width: 32.5%;" required>

            <label for="weight" style="margin-left: 30px;">Weight(kg)</label>
            <input type="text" id="weight" name="weight" style="" required>
          </div>

          <div class="input-group">
            <label for="religion">Religion</label>
            <input type="text" id="religion" name="religion" style="margin-left: 27px; width: 32.5%;" required>

            <label for="civil_status" style="margin-left: 30px;">Civil Status</label>
            <select id="civil_status" name="civil_status" style="margin-left: 1px;" required>
              <option disabled selected>Please Select</option>
              <option value="Single" name="Single">Single</option>
              <option value="Married" name="Married">Married</option>
            </select>
          </div>

          <div class="input-group">
            <label for="contact_no">Contact No</label>
            <input type="text" id="contact_no" name="contact_no"style="margin-left: 3px; width: 32.5%;" required>
          </div>

          <br>
          <hr>
          <br>
          <label class="intro">Address Information</label> 
          <br><br>

          <div class="input-group">
            <label for="add_unit_no">Unit No</label>
            <input type="text" id="add_unit_no" name="add_unit_no" placeholder="input numbers only" style="margin-left: 33px; width: 32.5%;" required>

            <label for="add_street" style="margin-left: 30px;">Street</label>
            <input type="text" id="add_street" name="add_street" style="margin-left: 25px;" required>
          </div>

          <div class="input-group">
            <label for="add_brgy">Barangay</label>
            <input type="text" id="add_brgy" name="add_brgy"style="margin-left: 14px; width: 32.5%;" required>

            <label for="add_city" style="margin-left: 30px;">City</label>
            <input type="text" id="add_city" name="add_city" style="margin-left: 40px;" required>
          </div>

          <div class="input-group">
            <label for="add_district">District</label>
            <input type="text" id="add_district" name="add_district" placeholder="Example: District 12" style="margin-left: 33px; width: 32.5%;" required>

            <label for="add_zip_code" style="margin-left: 30px;">Zip Code</label>
            <input type="text" id="add_zip_code" name="add_zip_code" placeholder="input numbers only" style="margin-left: 7px;" required>
          </div>


          <!-- Password Hidden-->
          <div class="input-group">
              <input type="hidden" id="password" name="password">
              <script type="text/javascript"> 
              document.getElementById("password").setAttribute('value','12345');
              </script>
          </div>
          <!-- Password Hidden-->

          <br>
          <br>
          <input type="submit" name="add_student" class="add2_btn" value="Add Student">
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