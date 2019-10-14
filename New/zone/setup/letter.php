<?php
include('config.php');

if(!isset($_COOKIE['user']))
{
  header('Location : login-1.php');
}
else
{
  $username=$_COOKIE['user'];
}


$result=mysqli_query($con, "select * from ztadetails where username='$username'")or die('Logged Out');
$array=mysqli_fetch_array($result,MYSQL_NUM);

$zone=$array[3];
$query 		= mysqli_query($con, "SELECT * FROM zcdetails WHERE zcdetails.zone='$zone'");
$row		= mysqli_fetch_array($query,MYSQL_NUM);

 ?>
<html>
<head>
  <style>
  #button{background:#0084ff;color:#fff;border-radius:10px;width:auto;box-shadow:5px 5px 5px #222;
    transition:all 1s ease;text-decoration:none;border:none;width:100%;height:50;
  }#button:hover{background:#fff;color:#222;
  }
  </style>
  <script>
  function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=900,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
</head>
<body>
<div name="elem" id="elem" ID="elem" style="visibility:hidden;display:none;">
<center>
  <table>
  <tr>
  <td colspan=3><center><font face="Cooper black" size=6><b>Samastha Kerala Sunni Balavedi</b></font><br>
  [Under : Samastha Kerala Jem-iyyathul Muallimeen Central Council]<br>
  <font face="helvetica" size=4><b><?php echo $array[3];?> Zone Committee | Reg. Number : <?php echo $array[5];?></b></font><br>
  Email : <?php echo $array[1];?>
  </center></td>
  </tr>

  <tr>
  <td colspan=3>
    <hr>
  </td>
  </tr>
  <tr>
  <td>
  <b>President</b><br>
  <?php echo $row[1];?><br>
  <?php echo $row[2];?><br>
  <?php echo $row[3];?>
  </td>
  <td style=text-align:center;>
  <b>Gen. Secretary</b><br>
  <?php echo $row[4];?><br>
  <?php echo $row[5];?><br>
  <?php echo $row[6];?>
  </td>
  <td style=text-align:right;>
  <b>Treasurer</b><br>
  <?php echo $row[8];?><br>
  <?php echo $row[9];?><br>
  <?php echo $row[10];?>
  </td>
  </tr>
  <tr>
  <td colspan=3>
  <hr>
  </td></tr>
  </table>
</center>
</div>

<div class=button>
<center>  <button id=button onclick=PrintElem(elem)>PRINT LETTER HEAD</button>
</div>

</body>
</html>
