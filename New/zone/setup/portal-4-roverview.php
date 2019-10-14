<?php include 'config.php';?>

<div class="alert alert-info">
  <strong>
<?php
    $result=mysqli_query($con,"SELECT count(*) FROM rtadetails WHERE zone='$array[3]'");
    $range_num=mysqli_fetch_array($result, MYSQL_ASSOC);
    $num_range=$range_num['count(*)'];
    echo "Number of registered ranges : ".$num_range."<br>";
    $rem=nor("$array[3]")-$num_range;
    echo "Ranges left : ".$rem;
?>
   </strong>
 </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Range</th>
      <th>Range Register number</th>
      <th>Email</th>
      <th>Username</th>
      <th>Password</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($num_range>0) {
      $range=ranges('$array[3]');
      for ($i=0; $i < nor('$array[3]'); $i++) {
        $query=$con->query("SELECT * FROM rtadetails WHERE range='$range[$i]')");
        if (!$query) {
          printf("Error: %s\n", mysqli_error($con));<?php
          include('setup\config.php');

          if(!isset($_COOKIE['user']))
          {
            header('Location:login-1.php');
          }
          else
          {
            $username=$_COOKIE['user'];
            $result=mysqli_query($con, "select * from ztadetails where username='$username'");
            $array=mysqli_fetch_array($result,MYSQL_NUM);
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
           <body background="bg1.jpg">
             <!--Navigation Bar-->
             <nav class="navbar navbar-inverse">
               <div class="container-fluid">
                 <div class="navbar-header">
                   <a class="navbar-brand" href="#"><font class="head">SKSBV</font><br><font class="head1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kozhikode District</font></a>
                 </div>
                 <ul class="nav navbar-nav">
                   <li><a href="portal-1-dashboard.php">Dashboard</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Zone<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="portal-2-zcoverview.php">Committee</a></li>
                      <li><a href="portal-3-zcupdate.php">Update Zone Details</a></li>
                    </ul>
                   <li class="dropdown" class="active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ranges<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                       <li class="active"><a href="portal-4-roverview.php">Overview</a></li>
                       <li><a href="portal-5-rregister.php">Register</a></li>
                       <li><a href="rleadeer.php">Leaders</a></li>
                     </ul>
                   </li>
                   <li><a href="#">Send Message</a></li>
                 </ul>
                 <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <span class="glyphicon glyphicon-user"></span><?php echo $array[3]." Zone";?><span class="caret"></span></a>
                     <ul class="dropdown-menu">
                       <li>Username : <?php echo $array[0];?></li>
                       <li>Zone Abbrev. : <?php echo $array[4];?></li>
                       <li>Zone id : <?php echo $array[5];?></li>
                       <li><a href="portal-3-zcupdate.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit profile</a></li>
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
                  <div class="panel-heading">Range Details</div>
                  <div class="panel-body">
                    <div class="alert alert-info">
                      <strong>
                        <?php
                        $result=mysqli_query($con,"SELECT count(*) FROM rtadetails WHERE zone='$array[3]'");
                        $range_num=mysqli_fetch_array($result, MYSQL_ASSOC);
                        $num_range=$range_num['count(*)'];
                        echo "Number of registered ranges : ".$num_range."<br>";
                        $rem=nor($array[3])-$num_range;
                        echo "Ranges left : ".$rem;
                         ?>
                       </strong>
                     </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Range</th>
                          <th>Range Register number</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Password</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($num_range>0) {
                          $range=ranges($array[3]);
                          for ($i=0; $i < nor($array[3]); $i++) {
                            $query=mysqli_query($con,"SELECT * FROM rtadetails WHERE range='$range[$i]'");
                            if (!$query) {
                              printf("Error: %s\n", mysqli_error($con));
                              exit();
                            }
                            $row=mysqli_fetch_array($query,MYSQL_ASSOC);
                            $range=$row['range'];
                            $rno=$row['rno'];
                            $remail=$row['remail'];
                            $ruser=$row['ruser'];
                            $rpass=$row['rpass'];
                            $num_row=mysqli_num_rows($query);
                            if ($num_row > 0)
                            {
                              echo "<tr><td><center>$range</center></td><td><center>$rno</center></td>
                              <td><center>$remail</center></td><td><center>$ruser</center></td>
                              <td><center>$rpass</center></td></tr>";
                            }else {
                              echo "<tr><td colspan=5>No ranges registered yet!</td></tr>";
                            }
                          }
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

          exit();
        }
        $row=mysqli_fetch_array($query,MYSQL_ASSOC);
        $range=$row['range'];
        $rno=$row['rno'];
        $remail=$row['remail'];
        $ruser=$row['ruser'];
        $rpass=$row['rpass'];
        $num_row=mysqli_num_rows($query);
        if ($num_row > 0)
        {
          echo "<tr><td><center>$range</center></td><td><center>$rno</center></td>
          <td><center>$remail</center></td><td><center>$ruser</center></td>
          <td><center>$rpass</center></td></tr>";
        }else {
          echo "<tr><td colspan=5>No ranges registered yet!</td></tr>";
        }
      }
    }
     ?>
</tbody>
</table>
