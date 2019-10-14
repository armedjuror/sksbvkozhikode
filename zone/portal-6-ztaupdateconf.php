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
          <?php
          if (isset($_POST['proceed'])) {
            $zone=$row['zone'];
            $taid=$_POST['taid'];

            $ta_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$taid'&&members.zone='$zone'");
            $ta=mysqli_fetch_array($ta_query);
            if (mysqli_num_rows($ta_query)==0) {
            echo "<script>
            alert('ID ($taid) does not exists or does not belongs to your range.');
            window.location.href='portal-4-rcupdate.php';
            </script>";
            }
          }
           ?>
           <div class="alert alert-danger">
             <strong>CAUTION : Please confirm all inputs. Once submitted cannot be changed.</strong>
           </div>
          <div class="panel panel-default">
            <div class="panel-heading">Update your range tech_@dmin</div>
            <div class="panel-body">
              <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="taid">tech_@dmin's membership id:</label>
                    <div class="col-sm-10">
                      <input type="text" id=input class="form-control" value="<?php echo $ta['id'];?>" name="taid" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="taname">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" id=input class="form-control" value="<?php echo $ta['name'];?>" name="taname" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="taads">Address:</label>
                    <div class="col-sm-10">
                      <textarea id=input class="form-control" name="taads" readonly><?php echo $ta['ads'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="tamob">Mobile:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $ta['mob'];?>" name="tamob" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="taemail">Email:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="taemail" required>
                    </div>
                  </div>

                <div class="form-group" name=button_validation>
                  <center>
                    <div class="col-sm-10">
                      <input type="submit" id=button name=register value="Register">
                    </div></center>
                    <?php
                    if (isset($_POST['register'])) {
                      $zone=$row['zone'];
                      $range=$row['range'];
                      $taid=$_POST['taid'];
                      $taname=$_POST['taname'];
                      $taads=$_POST['taads'];
                      $tamob=$_POST['tamob'];
                      $taemail=$_POST['taemail'];

                      /*Zone Committee registration*/
                      $sq="UPDATE ztadetails SET ztadetails.taid='$taid',ztadetails.taname='$taname',
                      ztadetails.taads='$taads',ztadetails.tamob='$tamob',ztadetails.taemail='$taemail' WHERE ztadetails.zone='$zone'";
                        if ($con->query($sq) == TRUE) {
                          echo "<script>
                          alert('$zone Zone tech_@dmin set Successfully !');
                          window.location.href='portal-1-dashboard.php';
                          </script>";
                        }if ($con->query($sq) == FALSE) {
                          echo "$con->error";

                        }
                      }
                      ?>
                    </div></center>
              </form>

          </div>
        </div>

    </div>
    </div>

    </body>
    </html>
