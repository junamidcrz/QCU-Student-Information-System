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

    if( empty($_POST['subj_code']) || empty($_POST['subj_description']) || empty($_POST['unit']) || empty($_POST['course_id']) )
    {
      echo "Please fillout all required fields"; 

    } else{ 
      $subj_code = $_POST['subj_code'];
      $subj_description = $_POST['subj_description'];
      $unit = $_POST['unit'];
      $course_id = $_POST['course_id'];

      $sql = "UPDATE subject SET 
              subj_code='{$subj_code}', 
              subj_description='{$subj_description}',
              unit='{$unit}', 
              course_id='{$course_id}'
              WHERE id=" . $_POST['id'];

      if( $conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Subject Information Updated!'); window.location.href = 'subjects.php';</script>";
      } else{
        echo "Error: There was an error while updating faculty information";
      }
    }
  }

  $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
  $sql = "SELECT * FROM subject WHERE id={$id}";
  $result = $conn->query($sql);

  if($result->num_rows < 1){
    header('Location: subjects.php');
    exit;
  }

  $row = $result->fetch_assoc();
  ?>


  <div class="content">

    <div class="form">
      <label class="title">Subject Information</label> 
      <a href="subjects.php"><button name="cancel" class="cancel_btn">Back</button></a>
      <div class="gap"> </div>

        <form action="" method="POST">
          <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

          <div class="input-group">
            <label for="subj_code" style="margin-right: 12px;">Subject Code</label>
            <input type="text" id="subj_code"  name="subj_code" style="width: 25%;" value="<?php echo $row['subj_code']; ?>">

            <label for="subj_description" style="margin-left: 35px;  margin-right: 12px;">Description</label>
            <input type="text" id="subj_description"  name="subj_description" style="width: 35%;" value="<?php echo $row['subj_description']; ?>"><br>
          </div>

          <div class="input-group">
            <label for="unit">Units</label>
            <input type="text" id="unit"  name="unit" style="width: 34.5%;" value="<?php echo $row['unit']; ?>">

            <label for="course_id" style="margin-left: 36px; margin-right: 42px;">Course</label>
            <select id="course_id" name="course_id" style="width: 35%;">
              <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
              <option value="BSIT" name="BSIT">BS Information Technology</option>
              <option value="BSEE" name="BSEE">BS Electronics Engineering</option>
              <option value="BSIE" name="BSIE">BS Industrial Engineering</option>
              <option value="BSE" name="BSE">BS Entrepreneurship</option>
              <option value="BSA" name="BSA">BS Accountancy</option>
            </select>
          </div>

          <input type="submit" name="update" class="edit_btn" value="Update">
          <a class="delete_btn" onclick="return confirm('Are you sure to delete this information?');" href="..\delete_subject_info.php?id=<?php echo $row['id']; ?>">Delete</a>
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