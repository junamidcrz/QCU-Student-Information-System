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
  <link rel="stylesheet" href="..\assets/css/profile.css">
</head>

<style>
  .content {
  height: auto;
  }
</style>
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

  <?php include ('..\student_profile.php');?>

  <?php while ($row=mysqli_fetch_array($result)){ ?>

  <div class="content">
   <div class="welcome">
        <p>Welcome, <?php echo $row['firstname'];?> <?php echo $row['lastname'];?> (<?php echo $login_session = $row['student_no']; ?>)</p>
        <hr>
    </div>

    <div class="form">                       
    <form action="#" method="#" autocomplete="off">
      <div class="intro">
        <p><i class="fas fa-user"></i><span> <b>Personal Information</b></span></p>
        <hr>
        <img src="..\assets/img/id_pic.jpg" class="id_image" alt="">
      </div>

    <div class="input-group">
          <label>Campus
           <input type="text" id="campus" name="campus" style="margin-left:30px;" value="<?php echo $row['campus']; ?>" readonly>
          </label>
     </div>

    <div class="input-group">
          <label>Course
            <input type="text" id="course" name="course" style="margin-left:40px;" value="<?php echo $row['course_code']; ?>" readonly>
          </label>
     </div>

     <div class="input-group">
      <label>Year Level
            <input type="text" id="year" name="year" style="margin-left:20px;" value="<?php echo $row['year']; ?>" readonly>
      </label>
     </div>

     <br>
     <hr>
     <br>

    <div class="input-group2">
      <table>
        <tr>
          <td style="padding-right: 25px;"><label>Name</label></td>
          <td><input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" readonly></td>
          <td><input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" readonly></td>
        </tr>

        <tr>
          <td></td>
          <td style="padding-left: 55px;"><label>Last Name</label></td>
          <td style="padding-left: 55px;"><label>First Name</label></td>
        </tr>
      </table>
    </div>

    <br>
    <div class="input-group2">
      <table>
        <tr>
          <td style="width: 15.5%;"></td>
          <td><input type="text" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>" readonly></td>
          <td><input type="text" id="extname" name="extname" value="<?php echo $row['extname']; ?>" readonly></td>
        </tr>

        <tr>
          <td></td>
          <td style="padding-left: 55px;"><label>Middle Name</label></td>
          <td style="padding-left: 55px;"><label>Ext. Name</label></td>
        </tr>
      </table>
    </div>

    <br><br>

   <div class="input-group">
      <table>

         <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

        <tr>
          <td style="width: 130px;"><label>Student Number</label></td>
          <td><input type="text" id="student_no" name="student_no" style="width: 80%;" value="<?php echo $row['student_no']; ?>" readonly></td>

          <td style="width: 100px;"><label>Gender</label></td>
          <td><input type="text" id="sex" name="sex" style="width: 80%;" value="<?php echo $row['sex']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>Birthday</label></td>
          <td><input type="text" id="birthday" name="birthday" style="width: 80%;" value="<?php echo $row['birthday']; ?>" readonly></td>

          <td><label>Age</label></td>
          <td><input type="text" id="age" name="age" style="width: 80%;" value="<?php echo $row['age']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>Birth Place</label></td>
          <td><input type="text" id="birthplace" name="birthplace" style="width: 80%;" value="<?php echo $row['birthplace']; ?>" readonly></td>

          <td><label>Height(cm)</label></td>
          <td><input type="text" id="height" name="height" style="width: 80%;" value="<?php echo $row['height']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>Religion</label></td>
          <td><input type="text" id="religion" name="religion" style="width: 80%;" value="<?php echo $row['religion']; ?>" readonly></td>

          <td><label>Weight(kg)</label></td>
          <td><input type="text" id="weight" name="weight" style="width: 80%;" value="<?php echo $row['weight']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>Contact Number</label></td>
          <td><input type="text" id="contact_no" name="contact_no" style="width: 80%;" value="<?php echo $row['contact_no']; ?>" readonly></td>

          <td><label>Civil Status</label></td>
          <td><input type="text" id="civil_status" name="civil_status" style="width: 80%;" value="<?php echo $row['civil_status']; ?>" readonly></td>
        </tr>

        <tr>

          <td><label>Email</label></td>
          <td><input type="text" id="email" name="email" style="width: 150%;" value="<?php echo $row['email']; ?>" readonly></td>
        </tr>
      </table>
    </div>

    <br>
    <hr>

    <div class="intro">
        <p><b>Permanent Address</b></p>
    </div>

    <div class="input-group">
      <table>
        <tr>
          <td style="width: 130px;"><label>Unit Number</label></td>
          <td><input type="text" id="add_unit_no" name="add_unit_no" style="width: 80%;" value="<?php echo $row['add_unit_no']; ?>" readonly></td>

          <td style="width: 100px;"><label>Street</label></td>
          <td><input type="text" id="add_street" name="add_street" style="width: 80%;" value="<?php echo $row['add_street']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>Barangay</label></td>
          <td><input type="text" id="add_brgy" name="add_brgy" style="width: 80%;" value="<?php echo $row['add_brgy']; ?>" readonly></td>

          <td><label>City</label></td>
          <td><input type="text" id="add_city" name="add_city" style="width: 80%;" value="<?php echo $row['add_city']; ?>" readonly></td>
        </tr>

        <tr>
          <td><label>District</label></td>
          <td><input type="text" id="add_district" name="add_district" style="width: 80%;" value="<?php echo $row['add_district']; ?>" readonly></td>

          <td><label>Zip Code</label></td>
          <td><input type="text" id="add_zip_code" name="add_zip_code" style="width: 80%;" value="<?php echo $row['add_zip_code']; ?>" readonly></td>
        </tr>
      </table>
    </div>

    </form>
    <?php } ?>
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