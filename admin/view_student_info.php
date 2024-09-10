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
  <link rel="stylesheet" href="..\assets/css/profile.css">

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

    <?php 
  include("..\connect.php");
  
  if(isset($_POST['update'])){

    if( empty($_POST['student_no']) || empty($_POST['lastname']) || empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['extname'])
      || empty($_POST['sex']) || empty($_POST['age']) || empty($_POST['birthday']) || empty($_POST['birthplace']) || empty($_POST['email']) 
      || empty($_POST['religion']) || empty($_POST['height']) || empty($_POST['weight']) || empty($_POST['email']) || empty($_POST['civil_status'])
      || empty($_POST['add_unit_no']) || empty($_POST['add_street']) || empty($_POST['add_brgy']) || empty($_POST['add_city']) || empty($_POST['add_district'])
      || empty($_POST['add_zip_code']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $student_no =  $_POST['student_no'];
      $lastname = $_POST['lastname'];
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $extname = $_POST['extname'];
      $sex = $_POST['sex'];
      $age = $_POST['age'];
      $birthday = $_POST['birthday'];
      $birthplace = $_POST['birthplace'];
      $religion = $_POST['religion'];
      $height = $_POST['height'];
      $weight = $_POST['weight'];
      $email = $_POST['email'];
      $civil_status = $_POST['civil_status'];
      $add_unit_no = $_POST['add_unit_no'];      
      $add_street = $_POST['add_street'];
      $add_brgy = $_POST['add_brgy'];
      $add_city = $_POST['add_city'];
      $add_district = $_POST['add_district'];
      $add_zip_code = $_POST['add_zip_code'];

      $sql = "UPDATE students SET 
              student_no='{$student_no}', 
              lastname='{$lastname}', 
              firstname='{$firstname}', 
              middlename='{$middlename}', 
              extname ='{$extname}',
              sex='{$sex}',
              age='{$age}', 
              birthday='{$birthday}', 
              birthplace='{$birthplace}',
              religion='{$religion}',
              height='{$height}',
              weight='{$weight}',
              email='{$email}', 
              civil_status='{$civil_status}',
              add_unit_no='{$add_unit_no}',
              add_street='{$add_street}',
              add_brgy='{$add_brgy}',
              add_city='{$add_city}',
              add_district='{$add_district}',
              add_zip_code='{$add_zip_code}'
              WHERE id=" . $_POST['id'];

      if( $conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Student Information Updated!'); window.location.href = 'students.php';</script>";
      } else{
        echo "Error: There was an error while updating student information";
      }
    }
  }

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT * FROM students WHERE id={$id}";
  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: students.php');
    exit;
  }

  $row = $result->fetch_assoc();
  ?>

  <div class="content">
    <div class="form">
    <a href="students.php"><button name="cancel" class="cancel_btn" style="margin-top: 17px; margin-right: 50px;">Cancel</button></a>

    <form action="" method="POST">
      <div class="intro">
        <p><i class="fas fa-user"></i><span> <b>Student Information</b></span></p>
        <hr>
      </div>

      <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
      <br>
      <br>
    <div class="input-group2">
      <table>
        <tr>
          <td style="padding-right: 25px;"><label>Name</label></td>
          <td><input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>"></td>
          <td><input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>"></td>
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
          <td><input type="text" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>"></td>
          <td><input type="text" id="extname" name="extname" value="<?php echo $row['extname']; ?>"></td>
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
          <td><input type="text" id="student_no" name="student_no" style="width: 80%;" value="<?php echo $row['student_no']; ?>"></td>

          <td style="width: 100px;"><label>Gender</label></td>
          <td><select id="sex" name="sex" style="width: 80%;">
              <option value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
              <option value="Female" name="Female">Female</option>
              <option value="Male" name="Male">Male</option>
            </select></td>
        </tr>

        <tr>
          <td><label>Birthday</label></td>
          <td><input type="text" id="birthday" name="birthday" style="width: 80%;" value="<?php echo $row['birthday']; ?>"></td>

          <td><label>Age</label></td>
          <td><input type="text" id="age" name="age" style="width: 80%;" value="<?php echo $row['age']; ?>"></td>
        </tr>

        <tr>
          <td><label>Birth Place</label></td>
          <td><input type="text" id="birthplace" name="birthplace" style="width: 80%;" value="<?php echo $row['birthplace']; ?>"></td>

          <td><label>Height(cm)</label></td>
          <td><input type="text" id="height" name="height" style="width: 80%;" value="<?php echo $row['height']; ?>"></td>
        </tr>

        <tr>
          <td><label>Religion</label></td>
          <td><input type="text" id="religion" name="religion" style="width: 80%;" value="<?php echo $row['religion']; ?>"></td>


          <td><label>Weight(kg)</label></td>
          <td><input type="text" id="weight" name="weight" style="width: 80%;" value="<?php echo $row['weight']; ?>"></td>
        </tr>

        <tr>
          <td><label>Contact Number</label></td>
          <td><input type="text" id="contact_no" name="contact_no" style="width: 80%;" value="<?php echo $row['contact_no']; ?>"></td>

          <td><label>Civil Status</label></td>
          <td><select id="civil_status" name="civil_status" style="width: 80%;">
              <option value="<?php echo $row['civil_status']; ?>"><?php echo $row['civil_status']; ?></option>
              <option value="Single" name="Single">Single</option>
              <option value="Married" name="Married">Married</option>
            </select></td>
        </tr>

        <tr>
          <td><label>Email</label></td>
          <td><input type="text" id="email" name="email" style="width: 150%;" value="<?php echo $row['email']; ?>"></td>
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
          <td><input type="text" id="add_unit_no" name="add_unit_no" style="width: 80%;" value="<?php echo $row['add_unit_no']; ?>"></td>

          <td style="width: 100px;"><label>Street</label></td>
          <td><input type="text" id="add_street" name="add_street" style="width: 80%;" value="<?php echo $row['add_street']; ?>"></td>
        </tr>

        <tr>
          <td><label>Barangay</label></td>
          <td><input type="text" id="add_brgy" name="add_brgy" style="width: 80%;" value="<?php echo $row['add_brgy']; ?>"></td>

          <td><label>City</label></td>
          <td><input type="text" id="add_city" name="add_city" style="width: 80%;" value="<?php echo $row['add_city']; ?>"></td>
        </tr>

        <tr>
          <td><label>District</label></td>
          <td><input type="text" id="add_district" name="add_district" style="width: 80%;" value="<?php echo $row['add_district']; ?>"></td>

          <td><label>Zip Code</label></td>
          <td><input type="text" id="add_zip_code" name="add_zip_code" style="width: 80%;" value="<?php echo $row['add_zip_code']; ?>"></td>
        </tr>
      </table>
    </div>

          <br>
          <input type="submit" name="update" class="edit_btn" value="Update" style="width: 13%;">
          <a class="delete_btn" onclick="return confirm('Are you sure to delete this information?');" href="..\delete_student_info.php?id=<?php echo $row['id']; ?>">Delete</a>
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