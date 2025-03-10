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
          <li class="active"><a href="portal-1-dashboard.php"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp; Dashboard</a></li>
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


 <!--Main content-->
 <div class="container">

   <div class="row">
     <div class="col-*-*">
       <div class="alert alert-info">
         <b><font color=#0084ff>Info:</font></b><br><ul type=square>
         <?php
        echo "<strong>";
         $zone=$row['zone'];
         $unit_query=mysqli_query($con,"SELECT * FROM rtadetails WHERE rtadetails.zone='$zone'");
         $num_unit=mysqli_num_rows($unit_query);
         echo "<li>Number of registered ranges : ".$num_unit;

         $ta_query=mysqli_query($con,"SELECT taname FROM ztadetails WHERE ztadetails.zone='$zone'");
         $ta=mysqli_fetch_array($ta_query);
         $taname=$ta['taname'];
         if ($taname==NULL) {
           echo "<li>tech_@dmin not set. Please set range tech_@dmin.</strong></ul>";
         }else {
           echo "<li>Congrats, tech_@dmin is already set.</strong></ul>";
         }

          ?>
        </div>
       <div class="panel panel-default">
         <div class="panel-heading">Zone Details</div>
         <div class="panel-body">
           <form class="form-horizontal">
             <div class="form-group">
               <label class="control-label col-sm-2" for="username">Username:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" readonly>
               </div>
             </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="zone">Zone:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['zone'];?>" name="zone" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="zno">Zone id:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['zno'];?>" name="zno" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="zemail">Email:</label>
                 <div class="col-sm-10">
                   <input type="email" class="form-control" value="<?php echo $row['zemail']?>" name="zemail" readonly>
                 </div>
               </div>

             </div>
           </form>

       </div>
     </div>



     <div class="col-*-*">
       <div class="panel panel-default">
         <div class="panel-heading">tech_@dmin's Details</div>
         <div class="panel-body">
           <form class="form-horizontal" action="">
             <div class="form-group">
               <label class="control-label col-sm-2" for="taname">Name:</label>
               <div class="col-sm-10">
                 <input type="text" id=input class="form-control" value="<?php echo $row['taname'];?>" name="taname" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="taads">Address:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id=input value="<?php echo $row['taads'];?>" name="taads" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="tarange">Range:</label>
               <div class="col-sm-10">
                 <input type="text" id=input class="form-control" value="<?php echo $row['tarange']?>" name="tarange" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="tamob">Mobile:</label>
               <div class="col-sm-10">
                 <input type="text" id=input class="form-control" value="<?php echo $row['tamob']?>" name="tamob" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="taemail">Email:</label>
               <div class="col-sm-10">
                 <input type="email" class="form-control" value="<?php echo $row['taemail']?>" name="taemail" readonly>
               </div>
             </div>
           </div>
         </div>
       </div>

 </div>
 </div>
 </body>
 </html>
