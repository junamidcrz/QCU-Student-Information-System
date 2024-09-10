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
  <?php include ('..\student_profile.php');?>

  <?php while ($row=mysqli_fetch_array($result)){ ?>

  <div class="content">
   <div class="welcome">
        <p>Welcome, <?php echo $row['firstname'];?> <?php echo $row['lastname'];?> (<?php echo $login_session = $row['student_no']; ?>)</p>
        <hr>
    </div>
    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
    <?php } ?>


    <div class="tables">
      <h1>Change Password</h1>

      <?php 
        include("..\connect.php");
  
        if(isset($_POST['update'])){

        $newPassword =($_POST['newPassword']);
        $confirmPassword =($_POST['confirmPassword']);

        if ($newPassword != $confirmPassword) {
          echo "<script type='text/javascript'>alert('Passwords do not match!'); window.location.href = 'password.php';</script>";
        }
      
        //inserting details on the database
        else{
          $sql = "UPDATE students SET 
            password='{$newPassword}'
            WHERE student_no='{$user_check}'";
      
        if( $conn->query($sql) === TRUE){
          echo "<script type='text/javascript'>alert('Password Updated!'); window.location.href = 'password.php';</script>";
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
            <td><label>Current Password: <labek></td>
            <td><input type="password" id="currentPassword" name="currentPassword"></span></td>
          </tr>
          <tr>
            <td><label>New Password: <labek></td>
            <td><input type="password" id="newPassword" name="newPassword"></span></td>
          </tr>
          <tr>
            <td><label>Confirm Password: <labek></td>
            <td><input type="password" id="confirmPassword" name="confirmPassword"></span></td>
          </tr>
        </table>

        <input type="submit" name="update" value="Update">

      </form>
      </div>
    </div>
  </div>

</body>
</html>