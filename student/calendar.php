<?php include ('..\student_session.php'); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> QCU SIS Portal </title>
	<script src="https://kit.fontawesome.com/b0811c54d0.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"charset="utf-8"></script>
	<link rel="stylesheet" href="..\assets/css/datepickk.min.css">
  <link rel="stylesheet" href="..\assets/css/portal.css">
  <link rel="stylesheet" href="..\assets/css/main.css">
<style>
   #datepicker {
    max-width: 500px;
    height: 500px;
    width: 100%;
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
    <a href="schedule.php"><i class="fas fa-list-ol"></i><span>Schedule</span></a>
    <a href="calendar.php"><i class="far fa-calendar-alt"></i><span>Calendar</span></a>
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
    <a href="schedule.php"><i class="fas fa-list-ol"></i><span>Schedule</span></a>
    <a href="calendar.php"><i class="far fa-calendar-alt"></i><span>Calendar</span></a>
    <a href="grades.php"><i class="fas fa-book-open"></i><span>Grades</span></a>
    <a href="password.php"><i class="fas fa-sliders-h"></i><span>Password</span></a>
  </div>

  <!--sidebar end-->

  <div class="content">
    <div id="datepicker"></div>
    <script src="..\assets/css/datepickk.min.js"></script>
    <script>

         var highlight = {
            start: new Date(2015,6,13),
            end: new Date(2015,6,19),
            backgroundColor: '#3faa56',
            color: '#ffffff',
            legend: 'CSS Conf.'
         };

         var highlight2 = {
            dates: {
              {
                start: new Date(2015,6,6),
                end: new Date(2015,6,7)
              },
              {
                start: new Date(2015,6,22),
                end: new Date(2015,6,23)
              }
            },
            backgroundColor: '#e99c00',
            color: '#ffffff',
            legend: 'Holidays'
         };

             var datepicker = new Datepickk({
                 container: document.querySelector('#datepicker'),
                 inline: true,
                 range: true,
                 highlight: [highlight,highlight2]
             });

             datepicker.setDate = new Date(2015,6,1);
             
    </script>
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