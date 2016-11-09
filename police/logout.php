<?php
include('dbcon.php');
include('session.php');

$logout_query=mysql_query("select * from user where User_id=$id_session");
$row=mysql_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];
session_start();
session_destroy();

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Logout', NOW(),'$type')")or die(mysql_error());


header('location:index.php');

?>