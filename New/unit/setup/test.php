<?php

if (isset($_POST['proceed'])) {
  $preid=$_POST['preid'];
  $secid=$_POST['secid'];
  $tresid=$_POST['tresid'];
  $vpre1id=$_POST['vpre1id'];
  $vpre2id=$_POST['vpre2id'];
  $vpre3id=$_POST['vpre3id'];
  $jsec1id=$_POST['jsec1id'];
  $jsec2id=$_POST['jsec2id'];
  $jsec3id=$_POST['jsec3id'];
  $counid=$_POST['counid'];

  $pre_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$preid'");
  $pre=mysqli_fetch_array($pre_query);
  if (mysqli_num_rows($pre_query)=0) {
  echo "<script>
  alert('ID ($preid) does not exist.');
  </script>";
  }

  $sec_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$secid'");
  $sec=mysqli_fetch_array($sec_query);
  if (mysqli_num_rows($sec_query)=0) {
  echo "<script>
  alert('ID ($secid) does not exist.');
  </script>";
  }

  $tres_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$tresid'");
  $tres=mysqli_fetch_array($tres_query);
  if (mysqli_num_rows($tres_query)=0) {
  echo "<script>
  alert('ID ($tresid) does not exist.');
  </script>";
  }

  $vpre1_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$vpre1id'");
  $vpre1=mysqli_fetch_array($vpre1_query);
  if (mysqli_num_rows($vpre1_query)=0) {
  echo "<script>
  alert('ID ($vpre1id) does not exist.');
  </script>";
  }

  $vpre2_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$vpre2id'");
  $vpre2=mysqli_fetch_array($vpre2_query);
  if (mysqli_num_rows($vpre2_query)=0) {
  echo "<script>
  alert('ID ($vpre2id) does not exist.');
  </script>";
  }

  $vpre3_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$vpre3id'");
  $vpre3=mysqli_fetch_array($vpre3_query);
  if (mysqli_num_rows($vpre3_query)=0) {
  echo "<script>
  alert('ID ($vpre3id) does not exist.');
  </script>";
  }

  $jsec1_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$jsec1id'");
  $jsec1=mysqli_fetch_array($jsec1_query);
  if (mysqli_num_rows($jsec1_query)=0) {
  echo "<script>
  alert('ID ($jsec1id) does not exist.');
  </script>";
  }

  $jsec2_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$jsec2id'");
  $jsec2=mysqli_fetch_array($jsec2_query);
  if (mysqli_num_rows($jsec2_query)=0) {
  echo "<script>
  alert('ID ($jsec2id) does not exist.');
  </script>";
  }

  $jsec3_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$jsec3id'");
  $jsec3=mysqli_fetch_array($jsec3_query);
  if (mysqli_num_rows($jsec3_query)=0) {
  echo "<script>
  alert('ID ($jsec3id) does not exist.');
  </script>";
  }

  $coun_query=mysqli_query($con,"SELECT * FROM members WHERE members.id='$counid'");
  $coun=mysqli_fetch_array($coun_query);
if (mysqli_num_rows($coun_query)=0) {
echo "<script>
alert('ID ($counid) does not exist.');
</script>";
}
}

?>
