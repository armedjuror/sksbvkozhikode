<?php
include('../setup/config.php');
include('../setup/session.php');

$result=mysqli_query($con, "SELECT * from units where uno='$session_id'")or die('Session logged out');
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
          <li  class="active"><a href="portal-1-dashboard.php"><span class="glyphicon glyphicon-dashboard"> </span>&nbsp; &nbsp;Dashboard</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Unit Committee<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-2-ucoverview.php">Committee</a></li>
              <li><a href="portal-3-uad.php">Advisory Board</a></li>
              <li><a href="portal-4-ucupdate.php">Register Committee</a></li>
              <li><a href="portal-5-uadupdate.php">Register Advisory Board</a></li>
              <li class="active"><a href="portal-6-uupdate.php">Update unit profile</a></li>
           </ul>
          </li>
          <li><a href="portal-7-mregister.php">Member registration</a></li>
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
         <div class="panel-heading">Update unit profile</div>
         <div class="panel-body">
           <form class="form-horizontal" action=# method="post">
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
                 <label class="control-label col-sm-2" for="username">Username:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" readonly>
                 </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="stno">Number of students:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Number of students" name="stno">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="sadr">Name of Sadr Muallim:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name of Sadr Muallim" name="sadr">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="sadrads">Address of Sadr Muallim:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Address of Sadr Muallim" name="sadrads"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="sadrmob">Mobile number of Sadr Muallim:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Mobile number of Sadr Muallim" name="sadrmob">
                  </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-sm-2" for="mads">Madrassa Address:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" placeholder="Madrassa Address" name="mads"></textarea>
                   </div>
                 </div>
                   <div class="form-group">
                     <div class="col-sm-10"><center>
                       <input type="submit" value="Update" name=update id=button>
                     </div>
                     <?php
                     if (isset($_POST['update'])) {
                       $unit=$row['unit'];
                       $stno=$_POST['stno'];
                       $sadr=ucwords($_POST['sadr']);
                       $sadrads=$_POST['sadrads'];
                       $sadrmob=$_POST['sadrmob'];
                       $mads=$_POST['mads'];

                       $sql="UPDATE units SET units.stno='$stno',units.mads='$mads',units.sadr='$sadr',units.sadrads='$sadrads',units.sadrmob='$sadrmob' WHERE units.unit='$unit'";
                       if ($con->query($sql)===TRUE) {
                            echo "<script>
                            alert('$unit profile updated successfully!');
                            window.location.href='portal-1-dashboard.php';
                            </script>";
                          }else {
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

 </div>
 </body>
 </html>
