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
}
$result=mysqli_query($con, "SELECT * from units where username='$username'")or die('Logged Out');
$row=mysqli_fetch_array($result);
 ?>

 <html>
 <head>
   <title>SKSBV Kozhikode District | Unit Portal</title>
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
          <li><a href="portal-1-dashboard.php">Dashboard</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Unit Committee<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-2-ucoverview.php">Committee</a></li>
              <li><a href="portal-3-uad.php">Advisory Board</a></li>
              <li><a href="portal-4-ucupdate.php">Register Committee</a></li>
              <li><a href="portal-6-uadpdate.php">Register Advisory Board</a></li>
              <li><a href="portal-6-uupdate.php">Update unit profile</a></li>
           </ul>
          </li>
          <li  class="active"><a href="portal-7-mregister.php">Member registration</a></li>
          <li><a href="portal-8-memberlist.php">Registered Members</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span><?php echo $row['unit']." UNIT";?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>Username : <?php echo $row['username'];?></li>
              <li><a href="portal-6-uupdate.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit profile</a></li>
              <li><a href="logout.php" name="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


 <!--Main content-->
 <div class="container">

   <div class="row">
     <div class="col-*-*">
       <div class="panel panel-default">
         <div class="panel-heading">Member Registration Confirmation</div>
         <div class="panel-body">
           <form class="form-horizontal" action="#" method=post>
             <div class="form-group">
               <label class="control-label col-sm-2" for="zone">Zone:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['zone'];?>" name="zone" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="range">Range:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['range'];?>" name="range" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="unit">Unit:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['unit'];?>" name="unit" readonly>
               </div>
             </div>
              <div class="form-group">
                 <label class="control-label col-sm-2" for="name">Name:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $_POST['name'];?>" name="name" required>
                </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="class">Class:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $_POST['class'];?>" name="class" required>
                  </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-sm-2" for="ads">Address:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" name="ads" required><?php echo $_POST['ads'];?></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="mob">Mobile:</label>
                    <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $_POST['mob'];?>" name="mob" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"><center>
                      <input type="submit" value="Register" name=register id=button><br><br>
                    </div>
                    <div class="col-sm-10"><center>
                      <a href="portal-7-mregister.php" target=_self><button id=button>Back</button></a>
                    </div>
                    <?php
                      if (isset($_POST['register'])){

                        $zone=$row['zone'];
                        $range=$row['range'];
                        $unit=$row['unit'];
                        $name=ucwords($_POST['name']);
                        $class=$_POST['class'];
                        $ads=$_POST['ads'];
                        $mob=$_POST['mob'];

                       $result=mysqli_query($con,"SELECT count(*) FROM members WHERE unit='$unit'");
                       $memb_num=mysqli_fetch_array($result, MYSQL_ASSOC);
                       $num_memb=$memb_num['count(*)'];
                       $rem=9-$num_memb;
                       if ($num_memb>=10) {
                         echo "<script>
                         alert('All Members Registered!');
                         window.location.href='portal-8-memberlist.php';
                         </script>";
                       }else {
                         $sql="INSERT INTO members (members.name,members.class,members.unit,
                           members.range,members.zone,members.ads,members.mob) VALUES
                           ('$name','$class','$unit','$range','$zone','$ads','$mob')";
                           if ($con->query($sql)===TRUE) {
                                echo "<script>
                                alert('$name Registered Successfully ! $rem Members left.');
                                window.location.href='portal-7-mregister.php';
                                </script>";
                              }else {
                                echo "<script>
                                alert('$name already registered! Error : $con->error');
                                window.location.href='portal-7-mregister.php';
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
