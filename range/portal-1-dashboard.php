<?php
include('../setup/config.php');
include('../setup/session.php');

$result=mysqli_query($con, "SELECT * from rtadetails where rno='$session_id'")or die('Session logged out');
$row=mysqli_fetch_array($result);

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
              <li><a href="portal-9-uregister.php">Register</a></li>
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


     <div class="col-*-*">
       <div class="alert alert-info">
         <b><font color=#0084ff>Info:</font></b><br><ul type=square>
         <?php
        echo "<strong> <li>Update and complete your profile fast.<li>Number of units : ".$row['unno'];
         $range=$row['range'];
         $unit_query=mysqli_query($con,"SELECT * FROM units WHERE units.range='$range'");
         $num_unit=mysqli_num_rows($unit_query);
         echo "<li>Number of registered units : ".$num_unit;

         $mem_query=mysqli_query($con,"SELECT * FROM members WHERE members.range='$range'");
         $num_mem=mysqli_num_rows($mem_query);
         echo "<br> <li>Number of registered members : ".$num_mem;

         $ta_query=mysqli_query($con,"SELECT taname FROM rtadetails WHERE rtadetails.range='$range'");
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
         <div class="panel-heading">Range Details</div>
         <div class="panel-body">
           <form class="form-horizontal">
             <div class="form-group">
               <label class="control-label col-sm-2" for="zone">Zone:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['zone'];?>" name="zone" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="username">Username:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" readonly>
               </div>
             </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="range">Range:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['range'];?>" name="range" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="rno">Range no.:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['rno'];?>" name="rno" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="remail">Email:</label>
                 <div class="col-sm-10">
                   <input type="email" class="form-control" value="<?php echo $row['remail']?>" name="remail" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="chairman">Chairman:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['chairman']?>" name="chairman" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="chairmanads">Chairman Address:</label>
                 <div class="col-sm-10">
                   <textarea class="form-control" name="chairmanads" readonly><?php echo $row['chairmanads']?></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="chairmanmob">Chairman Mobile:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['chairmanmob']?>" name="chairmanmob" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="convenor">Convenor:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['convenor']?>" name="convenor" readonly>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="convenorads">Convenor's Address :</label>
                 <div class="col-sm-10">
                   <textarea class="form-control" name="convenorads" readonly><?php echo $row['convenorads']?></textarea>
                 </div>
               </div>
               <div class="form-group">
                 <label class="control-label col-sm-2" for="convenormob">Convenor Mobile :</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $row['convenormob']?>" name="convenormob" readonly>
                 </div>
               </div>
           </form>

       </div>
     </div>

 </div>

 <div class="col-*-*">
   <div class="panel panel-default">
     <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> &nbsp;&nbsp;tech_@dmin's Details</div>
     <div class="panel-body">
       <form class="form-horizontal" action="">
         <div class="form-group">
           <label class="control-label col-sm-2" for="taid">Membership Id:</label>
           <div class="col-sm-10">
             <input type="text" id=input class="form-control" value="<?php echo $row['taid'];?>" name="taid" readonly>
           </div>
         </div>
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
 </body>
 </html>
