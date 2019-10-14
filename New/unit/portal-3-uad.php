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
              <li class=active><a href="portal-3-uad.php">Advisory Board</a></li>
              <li><a href="portal-4-ucupdate.php">Register Committee</a></li>
              <li><a href="portal-5-uadupdate.php">Register Advisory Board</a></li>
              <li><a href="portal-6-uupdate.php">Update unit profile</a></li>
           </ul>
          </li>
          <li><a href="portal-7-mregister.php">Member registration</a></li>
          <li><a href="portal-8-memberlist.php">Registered Members</a></li>
          <li><a href="#" onclick=window.print()><span class="glyphicon glyphicon-print"> </span>Print this page</a></li>
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
  <div class=row>
     <div class="col-*-*">
       <div class="panel panel-default">
         <div class="panel-heading">Advisory Board</div>
         <div class="panel-body">
           <form class="form-horizontal">
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
             <div class="form-group">
               <label class="control-label col-sm-2" for="skssfusec">SKSSF Unit Secretary :</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['skssfusec']?>" name="skssfusec" readonly>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" for="skssfusecmob">SKSSF Unit Secretary Mobile :</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" value="<?php echo $row['skssfusecmob']?>" name="skssfusecmob" readonly>
               </div>
             </div>
           </form>

       </div>
     </div>

 </div>

 </div>
 </div>
 </body>
 </html>
