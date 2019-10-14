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
              <li><a href="portal-7-roverview.php">Overview</a></li>
              <li class="active"><a href="portal-8-rregister.php">Register</a></li>
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

    <!--registration-->
    <div class="col-*-*">
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
      <div class="panel panel-default">
        <div class="panel-heading">Range Registration</div>
        <div class="panel-body">


          <form class="form-horizontal" action="portal-8-rregisterconf.php" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="zone">Zone:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"value="<?php echo $zone;?>" name="zone" readonly>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="range">Range:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="range" required>
                    <?php
                    switch ($zone) {
                      case 'KOYILANDY':
                        echo "<option>ARIKKULAM
                              <option>KAKKUR
                              <option>KOYILANDY
                              <option>MEPPAYYUR
                              <option>NANDI
                              <option>PARAPPALLI
                              <option>PAYYOLI
                              <option>THALAKKULATHUR
                              <option>THIRUVANGOOR
                              <option>ULLIYERI
                              ";
                              break;
                      case 'KOZHIKODE':
                        echo "<option>BEPORE
                              <option>CHELAVOOR
                              <option>CHERUVANNOOR
                              <option>FEROKE
                              <option>KOZHIKODE-CITY
                              <option>KOZHIKODE-WEST
                              <option>MANKAVU
                              <option>NALLALAM
                              <option>PANNIYANKARA
                              <option>PANTHEERANKAVU
                              <option>RAMANATTUKARA
                                ";
                              break;
                      case 'KUTTIADY':
                        echo "<option>KADIYANGAD
                              <option>KAKKATTIL
                              <option>KALLACHI
                              <option>KUTTIADY
                              <option>NADAPURAM
                              <option>NADUVANNOOR
                              <option>PARAKKADAVU
                              <option>PERAMBRA
                              <option>VANIMEL
                              ";
                              break;
                    case 'MAVOOR':
                      echo "<option>CHERUVADI
                            <option>KARANTHOOR
                            <option>KUTTIKKATTOOR
                            <option>MALAYAMMA
                            <option>MAVOOR
                            <option>MUKKAM
                            <option>PAZHUR
                            <option>PERUMANNA
                            <option>THIRUVAMBADI
                            ";
                            break;
                  case 'THAMARASSERY':
                    echo "<option>ARAMBRAM
                          <option>ELETTIL
                          <option>KODUVALLY
                          <option>NARIKKUNI
                          <option>OMASSERY
                          <option>POONOOR
                          <option>PUTHUPPADI
                          <option>THAMARASSERY
                          <option>UNNIKULAM
                          <option>VAVAD
                          ";
                          break;
                case 'VADAKARA':
                  echo "<option>AYANCHERY
                        <option>AZHIYOOR
                        <option>CHERAPURAM
                        <option>KADAMERI
                        <option>MANIYOOR
                        <option>ORKATTIRY
                        <option>THIRUVALLOOR
                        <option>VADAKARA
                        <option>VILLYAPALLI
                        ";
                  break;
                      default:
                      echo "Invalid Input";
                        break;
                    }
                    ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="rno">Range SKSBV Register Number:
                  <a href="setup\r.pdf" target="_blank" data-toggle="tooltip" title="Don't worry, Click and Check and further If register number of a range is not assigned,Assign it as zero."><font color="red">Don't Know!</font></a></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Range SKSBV Register Number" name="rno" required>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="remail">Range Email:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Range SKSBV Email" style="text-transform:lowercase" name="remail" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="remailpw">Range Email Password:<font color="red">Confidential</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Range SKSBV Email Password" name="remailpw" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"><center>
                      <input type="submit" class="add-row" value="Register" name=submit id=button><br>
                    </div>
                  </div>
            </div>
          </form>
      </div>
    </div>
    </div>
</div>

</body>
</html>
