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
  $result=mysqli_query($con, "SELECT * FROM units WHERE units.username='$username'")or die('Logged Out');
  $row=mysqli_fetch_array($result);
}


 ?>

 <html>
 <head>
   <title>SKSBV Kozhikode District | Range Portal</title>
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
   }#button{background:#0084ff;color:#fff;border-radius:10px;width:auto;height: 25;box-shadow:5px 5px 5px #222;
     transition:all 1s ease;text-decoration:none;border:none;
   }#button:hover{background:red;
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
          <li class="active"><a href="portal-1-dashboard.php"><span class="glyphicon glyphicon-dashboard"> </span>Dashboard</a></li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Range Committee<span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="portal-2-rcoverview.php">Committee</a></li>
             <li><a href="portal-3-rad.php">Advisory Board</a></li>
             <li><a href="portal-4-rcupdate.php">Register Committee</a></li>
             <li><a href="portal-5-radupdate.php">Register Advisory Board</a></li>
             <li><a href="portal-6-rupdate.php">Update range profile</a></li>
             <li><a href="portal-7-rtaupdate.php">Set tech_@dmin</a></li>

           </ul>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Units<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-8-uoverview.php">Overview</a></li>
              <li class="active"><a href="portal-9-uregister.php">Register</a></li>
            </ul>
          </li>
          <li><a href="portal-10-memberlist.php">Members</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span><?php echo $row['range']." RANGE";?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>Username : <?php echo $row['username'];?></li>
              <li>Range id : <?php echo $row['rno'];?></li>
              <li><a href="portal-6-rupdate.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit profile</a></li>
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
           $range=$row['range'];
           $result=mysqli_query($con,"SELECT count(*) FROM units WHERE units.range='$range'");
           $unit_num=mysqli_fetch_array($result, MYSQL_ASSOC);
           $num_unit=$unit_num['count(*)'];
           echo "Number of registered units : ".$num_unit."<br>";
           $rem=$row['unno']-$num_unit;
           echo "Units left : ".$rem;
            ?>
          </strong>
        </div>

        <div class="alert alert-danger">
          <strong>Please verify and confirm the entered details. Once submitted cannot be changed!</strong>
        </div>


       <div class="panel panel-default">
         <div class="panel-heading">Unit Registration</div>
         <div class="panel-body">
           <?php
           if (isset($_POST['submit'])) {
             $zone=$_POST['zone'];
             $range=$_POST['range'];
             $unit=strtoupper($_POST['unit']);
             $uno=$_POST['uno'];
             $username=$_POST['uno'];
             $password="unit".$_POST['uno'];
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
                   <label class="control-label col-sm-2" for="unit">Unit:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $unit;?>" name="unit" style="text-transform:UPPERCASE" readonly>
                   </div>
                   </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="uno">Unit SKIMVB Register Number:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $uno;?>" name="uno" readonly>
                   </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="username">SKSBV Unit portal Username:<font color="red">Confidential</font></label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $username;?>" name="username" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="password">SKSBV Range portal Password:<font color="red">Confidential</font></label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $password;?>" name="password" readonly>
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

                       /*Zone Committee registration*/
                       $zone=$_POST['zone'];
                       $range=$_POST['range'];
                       $unit=$_POST['unit'];
                       $uno=$_POST['uno'];
                       $username=$_POST['username'];
                       $password=$_POST['password'];
                       $sq="INSERT INTO units (units.zone,units.range,units.unit,units.uno,units.username,units.password)
                       VALUES ('$zone','$range','$unit','$uno','$username','$password')";
                         if ($con->query($sq) == TRUE) {
                           echo "<script>
                           alert('$unit Unit Successfully Registered !');
                           window.location.href='portal-9-uregister.php';
                           </script>";
                         }if ($con->query($sq) == FALSE) {
                           echo "$con->error";

                         }
                       }
                      ?>
             </div>
           </form>
       </div>
     </div>
     </div>
 </div>
 </body>
 </html>
