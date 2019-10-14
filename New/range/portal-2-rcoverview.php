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
  $result=mysqli_query($con, "SELECT * FROM rtadetails WHERE rtadetails.username='$username'")or die('Logged Out');
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
             <li class="active"><a href="portal-2-rcoverview.php">Committee</a></li>
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
          <li><a href="#" onclick=window.print()><span class="glyphicon glyphicon-print"> </span>Print this page</a></li>
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
      <div class="panel panel-default">
        <div class="panel-heading"><?php echo $row['range']." RANGE COMMITTEE";?></div>

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
              $range=$row['range'];
              $result= mysqli_query($con,"SELECT * FROM rcdetails WHERE rcdetails.range= '$range';");
              $rc		= mysqli_fetch_array($result);
              $num_row 	= mysqli_num_rows($result);
              if ($num_row > 0){
                echo "<tr><td class=leader>President</td><td class=leader>$rc[prename]</td><td class=leader>$rc[premob]</td></tr>
                <tr><td>Vice President</td><td>$rc[vpre1name]</td><td>$rc[vpre1mob]</td></tr>
                <tr><td>Vice President</td><td>$rc[vpre2name]</td><td>$rc[vpre2mob]</td></tr>
                <tr><td>Vice President</td><td>$rc[vpre3name]</td><td>$rc[vpre3mob]</td></tr>
                <tr><td class=leader>Gen. Secretary</td><td class=leader>$rc[secname]</td><td class=leader>$rc[secmob]</td></tr>
                <tr><td>Joint Secretary</td><td>$rc[jsec1name]</td><td>$rc[jsec1mob]</td></tr>
                <tr><td>Joint Secretary</td><td>$rc[jsec2name]</td><td>$rc[jsec2mob]</td></tr>
                <tr><td>Joint Secretary</td><td>$rc[jsec3name]</td><td>$rc[jsec3mob]</td></tr>
                <tr><td class=leader>Treasurer</td><td class=leader>$rc[tresname]</td><td class=leader>$rc[tresmob]</td></tr>
                <tr><td>Councilor</td><td>$rc[counname]</td><td>$rc[counmob]</td></tr>
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
</div>
</body>
</html>
