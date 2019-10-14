<?php include('./setup/config.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="setup\style.css">
</head>
<body>
<div class="form-wrapper">

  <form action="login-1.php" method="post">
    <h3>Zone Login</h3>

    <div class="form-item">
		<input type="text" name="user" placeholder="Username" required></input>
    </div>

    <div class="form-item">
		<input type="password" name="pass"placeholder="Password" required></input>
    </div>

    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);

			$query 		= mysqli_query($con, "SELECT * FROM ztadetails WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);

			if ($num_row > 0)
				{
          setcookie("user", $username, time() + (1800), "/");
          header('Location: portal-1-dashboard.php');
				}
			else
				{
					echo '<center><font color=red>Invalid Username and Password Combination</font></center>';
				}
		}
  ?>
  <div class="reminder">
    <p><a href="#">Trouble in logging in?</a></p>
    <p><a href="http://www.sksbvkozhikode.org/portal/portalselect.php">Change your portal</a></p>
  </div>

</div>

</body>
</html>
