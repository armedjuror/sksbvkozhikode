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
             <li><a href="portal-4-zcregister.php">Register Committee</a></li>
             <li><a href="portal-5-zadregister.php">Register Advisory Board</a></li>
             <li><a href="portal-6-ztaupdate.php">Update tech_@dmin details</a></li>

           </ul>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ranges<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-7-roverview.php">Overview</a></li>
              <li class="active"><a href="portal-8-rregister.php">Register</a></li>
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



<!--Main content-->
<div class="container">

  <div class="row">

    <!--registration-->
    <div class="col-*-*">
      <div class="alert alert-info">
        <strong>
      <?php
          $zone=$row['zone'];
          $result=mysqli_query($con,"SELECT count(*) FROM rtadetails WHERE zone='$zone'");
          $range_num=mysqli_fetch_array($result, MYSQL_ASSOC);
          $num_range=$range_num['count(*)'];
          echo "Number of registered ranges : ".$num_range."<br>";
          $rem=nor("$zone")-$num_range;
          echo "Ranges left : ".$rem;
      ?>
         </strong>
       </div>
      <div class="alert alert-danger">
        <strong>Please verify and confirm the entered details. Once submitted cannot be changed!</strong>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Range Registration</div>
        <div class="panel-body">
          <?php
          if (isset($_POST['submit'])) {
            $zone=$_POST['zone'];
            $range=$_POST['range'];
            $rno=$_POST['rno'];
            $remail=$_POST['remail'];
            $remailpw=$_POST['remailpw'];
            $ruser=strtolower($_POST['range']."range");
            $rpass=$_POST['remailpw'];
          }
            ?>
          <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="zone">Zone:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"value="<?php echo $zone;?>" name="zone" readonly>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="range">Range:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $range;?>" name="range" readonly>
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="rno">Range SKSBV Register Number:
                  <a href="setup\r.pdf" target="_blank" data-toggle="tooltip" title="Don't worry, Click and Check and further If register number of a range is not assigned,Assign it as zero."><font color="red">Don't Know!</font></a></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $rno;?>" name="rno" readonly>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="remail">Range Email:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $remail;?>" name="remail" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="remailpw">Range Email Password:<font color="red">Confidential</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $remailpw;?>" name="remailpw" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="ruser">SKSBV Range portal Username:<font color="red">Confidential</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $ruser;?>" style="text-transform:lowercase;" name="ruser" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="rpass">SKSBV Range portal Password:<font color="red">Confidential</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $rpass;?>" name="rpass" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"><center>
                      <input type="submit" value="Print & Register" onclick="window.print()" name=register id=button><br><br>
                    </div>
                    <div class="col-sm-10"><center>
                      <a href="portal-5-rregister.php" target=_self><button id=button>Back</button></a>
                    </div>
                    <?php
                    if (isset($_POST['register'])) {
                      $zone=$_POST['zone'];
                      $nor=nor($zone);
                      $range=$_POST['range'];
                      $rno=$_POST['rno'];
                      $remail=$_POST['remail'];
                      $remailpw=$_POST['remailpw'];
                      $ruser=strtolower($_POST['range']."range");
                      $rpass=$_POST['remailpw'];

                      $result=mysqli_query($con,"SELECT count(*) FROM rtadetails WHERE zone='$zone'");
                      $range_num=mysqli_fetch_array($result, MYSQL_ASSOC);
                      $num_range=$range_num['count(*)'];
                      $rem=$num_range-$nor;
                    if ($num_range >= $nor) {
                      echo "<script>
                      alert('All Ranges Registered!');
                      window.location.href='portal-1-dashboard.php';
                      </script>";
                    }else{
                      $sql="INSERT INTO rtadetails (rtadetails.zone,rtadetails.range,rtadetails.rno,rtadetails.remail,
                        rtadetails.remailpw,rtadetails.username,rtadetails.password) VALUES
                        ('$zone','$range','$rno','$remail','$remailpw','$ruser','$rpass')";
                    if ($con->query($sql)===TRUE) {
                         echo "<script>
                         alert('$range Range Registered Successfully ! $rem Ranges left.');
                         window.location.href='portal-5-rregister.php';
                         </script>";
                       }else {
                         echo "<script>
                         alert('$range Range Registration failed ! Error : $con->error');
                         window.location.href='portal-5-rregister.php';
                         </script>";
                       }
                    }
                    }
                  ?>
                  </div>

          </form>
          </div>
      </div>
    </div>
    </div>
</div>

</body>
</html>
