<?php
include('../setup/config.php');
include('../setup/session.php');

$result=mysqli_query($con, "SELECT * from ztadetails where zno='$session_id'")or die('Session logged out');
$row=mysqli_fetch_array($result);

 ?>
 <html>
 <head>
   <title>SKSBV Kozhikode District | Zonal Portal</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style>
   #button{background:#0084ff;color:#fff;border-radius:10px;width:auto;height: 25;box-shadow:5px 5px 5px #222;
        transition:all 1s ease;text-decoration:none;border:none;
      }#button:hover{background:red;
      }

   #input{
     text-transform: uppercase;
   }.head{
     font-family:Cooper Black;
     color: #0084ff;
     font-size: 38px;
   }.head1{
     font-family:Comic Sans MS;
     color: #7ab700;
     font-size: 10px;
   }
   </style>
  </head>
  <body background="setup\img\bglogin.jpg">
    <!--Navigation Bar-->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><font class="head">SKSBV</font><br><font class="head1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kozhikode District</font></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="portal-1-dashboard.php"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp; Dashboard</a></li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Zone Committee<span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="portal-2-zcoverview.php">Committee</a></li>
             <li><a href="portal-3-zad.php">Advisory Board</a></li>
             <li><a href="portal-4-zcregister.php">Register Committee</a></li>
             <li><a href="portal-5-zadregister.php">Register Advisory Board</a></li>
             <li class="active"><a href="portal-6-ztaupdate.php">Update tech_@dmin details</a></li>
           </ul>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ranges<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-7-roverview.php">Overview</a></li>
              <li><a href="portal-8-rregister.php">Register</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span><?php echo $row['zone']." ZONE";?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>Username : <?php echo $row['username'];?></li>
              <li>Zone Abbrev. : <?php echo $row['zabr'];?></li>
              <li>Zone id : <?php echo $row['zno'];?></li>
              <li><a href="portal-6-ztaupdate.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit profile</a></li>
              <li><a href="logout.php" name="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">

      <div class="row">
        <div class="col-*-*">
          <div class="panel panel-default">
            <div class="panel-heading">Update your range tech_@dmin</div>
            <div class="panel-body">
              <form class="form-horizontal" action="portal-6-ztaupdateconf.php" method="post">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="taid">tech_@dmin's membership id:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="tech_@admins membership id" name="taid" required>
                  </div>
                </div>
                <div class="form-group" name=button_validation>
                  <center>
                    <div class="col-sm-10">
                      <input type="submit" id=button name=proceed value="Load Info">
                    </div></center>
              </form>

          </div>
        </div>

    </div>
    </div>

    </body>
    </html>
