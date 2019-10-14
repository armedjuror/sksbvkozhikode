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
             <li class="active"><a href="portal-2-zcoverview.php">Committee</a></li>
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
      <div class="panel panel-default">
        <div class="panel-heading">Zone Committee</div>

        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Designation</th>
                <th>Name</th>
                <th>Mobile</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $zone=$row['zone'];
              $query 		= mysqli_query($con, "SELECT * FROM zcdetails WHERE  zcdetails.zone='$zone'");
              $zc	= mysqli_fetch_array($query,MYSQL_ASSOC);
              $num_row 	= mysqli_num_rows($query);

              if ($num_row > 0){
                echo "<tr><td class=leader>President</td><td class=leader>$zc[prename]</td><td class=leader>$zc[premob]</td></tr>
                <tr><td>Vice President</td><td>$zc[vpre1name]</td><td>$zc[vpre1mob]</td></tr>
                <tr><td>Vice President</td><td>$zc[vpre2name]</td><td>$zc[vpre2mob]</td></tr>
                <tr><td>Vice President</td><td>$zc[vpre3name]</td><td>$zc[vpre3mob]</td></tr>
                <tr><td class=leader>Gen. Secretary</td><td class=leader>$zc[secname]</td><td class=leader>$zc[secmob]</td></tr>
                <tr><td>Joint Secretary</td><td>$zc[jsec1name]</td><td>$zc[jsec1mob]</td></tr>
                <tr><td>Joint Secretary</td><td>$zc[jsec2name]</td><td>$zc[jsec2mob]</td></tr>
                <tr><td>Joint Secretary</td><td>$zc[jsec3name]</td><td>$zc[jsec3mob]</td></tr>
                <tr><td class=leader>Treasurer</td><td class=leader>$zc[tresname]</td><td class=leader>$zc[tresmob]</td></tr>
                <tr><td>Councilor</td><td>$zc[counname]</td><td>$zc[counmob]</td></tr>
                ";

              }else {
                echo "<tr><td colspan=3><center>Committee details yet not uploaded</td></tr>";
              }
              ?>

            </tbody>
          </table>
      </div>
    </div>

</div>
</div>
</body>
</html>
