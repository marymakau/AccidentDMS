<?php
  include('dbcon.php');
  $get_id=$_GET['id'];
  mysql_query("delete from user where User_id='$get_id'")  or die(mysql_error());
  header('location:user_accountP.php');  
?>
