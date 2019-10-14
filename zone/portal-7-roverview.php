<?php
include('../setup/config.php');
include('../setup/session.php');

$result=mysqli_query($con, "SELECT * from ztadetails where zno='$session_id'") or
 die('<script>
 alert(Session logged out!);
 window.location.href=logout.php;');
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
              <li class="active"><a href="portal-7-roverview.php">Overview</a></li>
              <li><a href="portal-8-rregister.php">Register</a></li>
            </ul>
          </li>
          <li>
              <a href=# onclick="window.print()"><span class="glyphicon glyphicon-print"></span>Print this page</a>
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
      <div class="panel panel-default">
        <div class="panel-heading">Range Registration Details</div>
        <div class="panel-body">
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
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Range</th>
                <th>Range Register number</th>
                <th>Range office</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($num_range>0) {
                $sql=mysqli_query($con,"SELECT * FROM rtadetails WHERE rtadetails.zone='$zone'");
                while ($row = mysqli_fetch_array($sql)){

                	echo "<tr>
                            <td>$row[range]</td>
                            <td>$row[rno]</td>
                            <td>$row[oads]</td>
                            <td>$row[remail]</td>
                            <td>$row[username]</td>
                            <td>$row[password]</td>
                        </tr>";
                }
              }else {
                echo "<tr><td colspan=5><center>No ranges registered yet!</center></td></tr>";
              }
               ?>
          </tbody>
        </table>

      </div>


</div>
</div>
</div>
</div>
</body>
</html>
