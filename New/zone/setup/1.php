<?php include 'config.php';?>

<div class="alert alert-info">
  <strong>
<?php
    $result=mysqli_query($con,"SELECT count(*) FROM rtadetails WHERE zone='THAMARASSERY'");
    $range_num=mysqli_fetch_array($result, MYSQL_ASSOC);
    $num_range=$range_num['count(*)'];
    echo "Number of registered ranges : ".$num_range."<br>";
    $rem=nor("THAMARASSERY")-$num_range;
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
      $range=ranges('THAMARASSERY');
      for ($i=0; $i < nor('THAMARASSERY'); $i++) {
        $query=$con->query("SELECT * FROM rtadetails WHERE range=`ELETTIL`)");
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
