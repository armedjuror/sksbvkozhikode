<?php
include('setup\config.php');

if(!isset($_COOKIE['user']))
{
  echo "<script>
  alert('Logged Out!');
  window.location.href='logout.php';
  </script>";
}
else
{
  $username=$_COOKIE['user'];
  $result=mysqli_query($con, "SELECT * FROM ztadetails WHERE ztadetails.username='$username'")or die('Logged Out');
  $row=mysqli_fetch_array($result);
}


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
             <li class="active"><a href="portal-4-zcregister.php">Register Committee</a></li>
             <li><a href="portal-5-zadregister.php">Register Advisory Board</a></li>
             <li><a href="portal-6-ztaupdate.php">Update tech_@dmin details</a></li>
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
              <div class="panel-heading">Zone Committee Registration</div>
              <div class="panel-body">
                <form class="form-horizontal" action="portal-4-zcregisterconf.php" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="preid">President's membership id:</label>
                      <div class="col-sm-10">
                        <input type="text" id=input class="form-control" placeholder="President's membership id" name="preid" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="secid">Gen. Secretary's membership id:</label>
                      <div class="col-sm-10">
                        <input type="text" id=input class="form-control" placeholder="Gen. Secretary's membership id" name="secid" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="tresid">Treasurer's membership id:</label>
                      <div class="col-sm-10">
                        <input type="text" id=input class="form-control" placeholder="Treasurer's membership id" name="tresid" required>
                      </div>
                    </div>

                  <div class="alert alert-info" name=vpre>
                    <strong>Vice Presidents</strong>
                    <div class="alert alert-warning" name=vpre1>
                      <strong>1</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="vpre1id">Membership id</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="vpre1id" required>
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-warning" name=vpre2>
                      <strong>2</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="vpre2id">Membership id:</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="vpre2id" required>
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-warning" name=vpre3>
                      <strong>3</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="vpre3id">Membership id:</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="vpre3id" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="alert alert-info" name=jsec>
                    <strong>Joint Secretaries</strong>

                    <div class="alert alert-warning" name=jsec1>
                      <strong>1</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="jsec1id">Membership id:</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="jsec1id" required>
                        </div>
                      </div>
                    </div>

                    <div class="alert alert-warning" name=jsec2>
                      <strong>2</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="jsec2id">Membership id:</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="jsec2id" required>
                        </div>
                      </div>
                    </div>

                    <div class="alert alert-warning" name=jsec3>
                      <strong>3</strong>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="jsec3id">Membership id:</label>
                        <div class="col-sm-10">
                          <input type="text" id=input class="form-control" placeholder="Membership id" name="jsec3id" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="alert alert-info" name=coun>
                    <strong>Councilor</strong>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="counid">Membership id:</label>
                      <div class="col-sm-10">
                        <input type="text" id=input class="form-control" placeholder="Membership id" name="counid" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" name=button_validation>
                    <center>
                      <div class="col-sm-10"><center>
                        <input type="submit" id=button name=proceed value="Load Info">
                      </div></center>
                  </div>
                </form>

            </div>
            </div>
          </div>
        </div>
    </div>
    </body>
    </html>
