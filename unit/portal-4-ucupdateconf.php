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
          <li  class="active"><a href="portal-1-dashboard.php">Dashboard</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Unit Committee<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="portal-2-ucoverview.php">Committee</a></li>
              <li><a href="portal-3-uad.php">Advisory Board</a></li>
              <li class=active><a href="portal-4-ucupdate.php">Register Committee</a></li>
              <li><a href="portal-5-uadupdate.php">Register Advisory Board</a></li>
              <li><a href="portal-6-uupdate.php">Update unit profile</a></li>
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
     <?php

     if (isset($_POST['proceed'])) {
       $unit=$row['unit'];
       $preid=$_POST['preid'];
       $secid=$_POST['secid'];
       $tresid=$_POST['tresid'];
       $vpre1id=$_POST['vpre1id'];
       $vpre2id=$_POST['vpre2id'];
       $jsec1id=$_POST['jsec1id'];
       $jsec2id=$_POST['jsec2id'];
       $counid=$_POST['counid'];

       $pre_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$preid'&&members.unit='$unit'");
       $pre=mysqli_fetch_array($pre_query);
       if (mysqli_num_rows($pre_query)==0) {
       echo "<script>
       alert('ID ($preid) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $sec_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$secid'&&members.unit='$unit'");
       $sec=mysqli_fetch_array($sec_query);
       if (mysqli_num_rows($sec_query)==0) {
       echo "<script>
       alert('ID ($secid) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $tres_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$tresid'&&members.unit='$unit'");
       $tres=mysqli_fetch_array($tres_query);
       if (mysqli_num_rows($tres_query)==0) {
       echo "<script>
       alert('ID ($tresid) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $vpre1_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$vpre1id'&&members.unit='$unit'");
       $vpre1=mysqli_fetch_array($vpre1_query);
       if (mysqli_num_rows($vpre1_query)==0) {
       echo "<script>
       alert('ID ($vpre1id) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $vpre2_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$vpre2id'&&members.unit='$unit'");
       $vpre2=mysqli_fetch_array($vpre2_query);
       if (mysqli_num_rows($vpre2_query)==0) {
       echo "<script>
       alert('ID ($vpre2id) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $jsec1_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$jsec1id'&&members.unit='$unit'");
       $jsec1=mysqli_fetch_array($jsec1_query);
       if (mysqli_num_rows($jsec1_query)==0) {
       echo "<script>
       alert('ID ($jsec1id) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $jsec2_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$jsec2id'&&members.unit='$unit'");
       $jsec2=mysqli_fetch_array($jsec2_query);
       if (mysqli_num_rows($jsec2_query)==0) {
       echo "<script>
       alert('ID ($jsec2id) does not exists or does not belongs to your unit.');
       window.location.href='portal-4-ucupdate.php';
       </script>";
       }

       $coun_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$counid'&&members.unit='$unit'");
       $coun=mysqli_fetch_array($coun_query);
     if (mysqli_num_rows($coun_query)==0) {
     echo "<script>
     alert('ID ($counid) does not exists or does not belongs to your unit.');
     window.location.href='portal-4-ucupdate.php';
     </script>";
     }
     }

     ?>
     <div class="col-*-*">
       <div class="alert alert-danger">
         <strong>CAUTION : Please confirm all inputs. Once submitted cannot be changed.</strong>
       </div>
         <div class="panel panel-default">
           <div class="panel-heading">Unit Committee Registration</div>
           <div class="panel-body">
             <form class="form-horizontal" action="#" method="post" name="unitcommittee">

               <div class="alert alert-info" name=president>
                 <strong>President</strong>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="preid">President's membership id:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $pre['id'];?>" name="preid" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="prename">Name:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $pre['name'];?>" name="prename" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="preads">Address:</label>
                   <div class="col-sm-10">
                     <textarea id=input class="form-control" name="preads" readonly><?php echo $pre['ads'];?></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="premob">Mobile:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $pre['mob'];?>" name="premob" readonly>
                   </div>
                 </div>





               </div>

               <div class="alert alert-info" name=secretary>
                 <strong>Gen. Secretary</strong>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="secid">Gen. Secretary's membership id:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $sec['id'];?>" name="secid" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="secname">Name:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $sec['name'];?>" name="secname" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="secads">Address:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" name="secads" readonly><?php echo $sec['ads'];?></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="secmob">Mobile:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $sec['mob'];?>" name="secmob" readonly>
                   </div>
                 </div>
               </div>

               <div class="alert alert-info" name=treasurer>
                 <strong>Treasurer</strong>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="tresid">Treasurer's membership id:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $tres['id'];?>" name="tresid" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="tresname">Name:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $tres['name'];?>" name="tresname" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="tresads">Address:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" name="tresads" readonly><?php echo $tres['ads'];?></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="tresmob">Mobile:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $tres['mob'];?>" name="tresmob" readonly>
                   </div>
                 </div>
               </div>

               <div class="alert alert-info" name=vpre>
                 <strong>Vice Presidents</strong>
                 <div class="alert alert-warning" name=vpre1>
                   <strong>1</strong>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre1id">Membership id</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $vpre1['id'];?>" name="vpre1id" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre1name">Name:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $vpre1['name'];?>" name="vpre1name" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre1mob">Mobile:</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $vpre1['mob'];?>" name="vpre1mob" readonly>
                     </div>
                   </div>
                 </div>
                 <div class="alert alert-warning" name=vpre2>
                   <strong>2</strong>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre2id">Membership id</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $vpre2['id'];?>" name="vpre2id" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre2name">Name:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $vpre2['name'];?>" name="vpre2name" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="vpre2mob">Mobile:</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $vpre2['mob'];?>" name="vpre2mob" readonly>
                     </div>
                   </div>
                 </div>
               </div>

               <div class="alert alert-info" name=jsec>
                 <strong>Joint Secretaries</strong>

                 <div class="alert alert-warning" name=jsec1>
                   <strong>1</strong>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec1id">Membership id:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $jsec1['id'];?>" name="jsec1id" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec1name">Name:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $jsec1['name'];?>" name="jsec1name" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec1mob">Mobile:</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $jsec1['mob'];?>" name="jsec1mob" readonly>
                     </div>
                   </div>
                 </div>

                 <div class="alert alert-warning" name=jsec2>
                   <strong>2</strong>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec2id">Membership id:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $jsec2['id'];?>" name="jsec2id" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec2name">Name:</label>
                     <div class="col-sm-10">
                       <input type="text" id=input class="form-control" value="<?php echo $jsec2['name'];?>" name="jsec2name" readonly>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-sm-2" for="jsec2mob">Mobile:</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="<?php echo $jsec2['mob'];?>" name="jsec2mob" readonly>
                     </div>
                   </div>
                 </div>

                 
               </div>

               <div class="alert alert-info" name=coun>
                 <strong>Councilor</strong>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="counid">Membership id:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $coun['id'];?>" name="counid" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="counname">Name:</label>
                   <div class="col-sm-10">
                     <input type="text" id=input class="form-control" value="<?php echo $coun['name'];?>" name="counname" readonly>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="counmob">Mobile:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $coun['mob'];?>" name="counmob" readonly>
                   </div>
                 </div>
               </div>

               <div class="form-group" name=button_validation>
                 <center>
                   <div class="col-sm-10">
                     <input type="submit" id=button name=register value="Register">
                   </div></center>
                   <?php
                   if (isset($_POST['register'])) {
                     $zone=$row['zone'];
                     $range=$row['range'];
                     $unit=$row['unit'];
                     $uno=$row['username'];
                     $preid=$_POST['preid'];
                     $prename=$_POST['prename'];
                     $preads=$_POST['preads'];
                     $premob=$_POST['premob'];
                     $secid=$_POST['secid'];
                     $secname=$_POST['secname'];
                     $secads=$_POST['secads'];
                     $secmob=$_POST['secmob'];
                     $tresid=$_POST['tresid'];
                     $tresname=$_POST['tresname'];
                     $tresads=$_POST['tresads'];
                     $tresmob=$_POST['tresmob'];
                     $vpre1id=$_POST['vpre1id'];
                     $vpre1name=$_POST['vpre1name'];
                     $vpre1mob=$_POST['vpre1mob'];
                     $vpre2id=$_POST['vpre2id'];
                     $vpre2name=$_POST['vpre2name'];
                     $vpre2mob=$_POST['vpre2mob'];
                     $jsec1id=$_POST['jsec1id'];
                     $jsec1name=$_POST['jsec1name'];
                     $jsec1mob=$_POST['jsec1mob'];
                     $jsec2id=$_POST['jsec2id'];
                     $jsec2name=$_POST['jsec2name'];
                     $jsec2mob=$_POST['jsec2mob'];
                     $counid=$_POST['counid'];
                     $counname=$_POST['counname'];
                     $counmob=$_POST['counmob'];

                     /*Zone Committee registration*/
                     $sq="INSERT INTO ucdetails VALUES ('$zone','$range','$unit','$uno','$preid',
                       '$prename','$preads','$premob',
                       '$secid','$secname','$secads','$secmob','$tresid','$tresname','$tresads',
                       '$tresmob','$vpre1id','$vpre1name','$vpre1mob',
                       '$vpre2id','$vpre2name','$vpre2mob',
                       '$jsec1id','$jsec1name','$jsec1mob','$jsec2id','$jsec2name','$jsec2mob','$counid','$counname','$counmob')";
                       if ($con->query($sq) == TRUE) {
                         echo "<script>
                         alert('$unit Unit Committee Successfully Registered !');
                         window.location.href='portal-2-ucoverview.php';
                         </script>";
                       }if ($con->query($sq) == FALSE) {
                         echo "<script>
                         alert('$unit Unit Committee already Registered !');
                         window.location.href='portal-1-dashboard.php';
                         </script>";

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
