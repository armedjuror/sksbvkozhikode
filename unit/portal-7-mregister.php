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
          <li><a href="portal-1-dashboard.php">Dashboard</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Unit Committee<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-2-ucoverview.php">Committee</a></li>
              <li><a href="portal-3-uad.php">Advisory Board</a></li>
              <li><a href="portal-4-ucupdate.php">Register Committee</a></li>
              <li><a href="portal-6-uadupdate.php">Register Advisory Board</a></li>
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
         <div class="panel-heading">Committee Member Registration</div>
         <div class="panel-body">
          <div class="alert alert-info">
             <strong>
           <?php
                $unit=$row['unit'];
               $result=mysqli_query($con,"SELECT count(*) FROM members WHERE unit='$unit'");
               $memb_num=mysqli_fetch_array($result, MYSQL_ASSOC);
               $num_memb=$memb_num['count(*)'];
               echo "Number of registered committee members : ".$num_memb."<br>";
               $rem=8-$num_memb;
               echo "Members left : ".$rem;
               if ($rem=0) {
                 echo "All Members Registered!";
               }
           ?>
         </strong>
       </div>
       <?php
       if ($num_memb!==10) {
         echo "<div style=visibility:visible;>";
       }else {
         echo "<div style=visibility:hidden;display:none;>";
       }
       ?>
           <form class="form-horizontal" action="portal-7-mregisterconf.php" method=post>
              <div class="form-group">
                 <label class="control-label col-sm-2" for="name">Name:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" placeholder="Name" name="name" required>
                 </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-2" for="class">Class:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="class" required>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12 or completed</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-sm-2" for="ads">Address:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" placeholder="Address" name="ads" required></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="mob">Mobile:</label>
                    <div class="col-sm-10">
                   <input type="text" class="form-control" placeholder="Mobile" name="mob" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"><center>
                      <input type="submit" value="Register" name=proceed id=button>
                    </div>
                  </div>
           </form>
         </div>
         </div>
       </div>

     </div>

 </div>

 </div>
 </body>
 </html>
