<?php include('../setup/config.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../setup/style.css">
</head>
<body>
<div class="form-wrapper">

  <form action="login-1-setup.php" method="post">
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
  <div class="reminder">
    <p><a href="http://www.sksbvkozhikode.org">Change your portal</a></p>
  </div>

</div>

</body>
</html>
