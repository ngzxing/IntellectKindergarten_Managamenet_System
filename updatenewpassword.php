<?php include  ('dbconnect.php');

if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $pemail=$_POST['pemail'];
  $ppass=$_POST['ppassword'];
  $select=mysql_query("update user set password='$ppass' where email='$pemail'");
}
?>