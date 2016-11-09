<?php include('dbcon.php');?>
<?php
ob_start();
?><!DOCTYPE html>
<html lang="en">
<head><title>ACCIDENT DBMS</title>
    <link href="img/dep2.jpg" rel="icon" type="image"> 
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">



    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-carousel.js"></script>
    <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
    <script type="text/javascript" src="js/bootstrap-popover.js"></script>
    <script type="text/javascript" src="js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="scripts/swfobject/swfobject.js"></script>
    
    <!----hover pop up -->
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/mouseover_popup.js" type="text/javascript"></script>
    <div style="display: none;
        color:white;
        position: absolute;
        z-index:100;
        width:auto;
        height:auto;"
        id="preview_div"></div>




    <script type="text/javascript" language="JavaScript">
        <!-- Copyright 2002 Bontrager Connection, LLC

        function getCalendarDate()
        {
            var months = new Array(13);
            months[0]  = "January";
            months[1]  = "February";
            months[2]  = "March";
            months[3]  = "April";
            months[4]  = "May";
            months[5]  = "June";
            months[6]  = "July";
            months[7]  = "August";
            months[8]  = "September";
            months[9]  = "October";
            months[10] = "November";
            months[11] = "December";
            var now         = new Date();
            var monthnumber = now.getMonth();
            var monthname   = months[monthnumber];
            var monthday    = now.getDate();
            var year        = now.getYear();
            if(year < 2000) { year = year + 1900; }
            var dateString = monthname +
            ' ' +
            monthday +
            ', ' +
            year;
            return dateString;
        } // function getCalendarDate()
        //-->

    </script>	



    <!-- notify -->
    <link href="css/notify/jquery_notification.css" type="text/css" rel="stylesheet" media="screen, projection"/>
    <script type="text/javascript" src="js/notify/jquery_notification_v.1.js"></script>
    <!-- notify end -->
    <style type="text/css" title="currentStyle">
        @import "css/datatable/demo_page.css";
        @import "css/datatable/demo_table_jui.css";
        @import "css/datatable/jquery-ui-1.8.4.custom.css";
    </style>
    <script type="text/javascript" language="javascript" src="js/dataTables/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
        jQuery(document).ready(function() {
            oTable = jQuery('#log').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            } );
            oTable = jQuery('#attendance').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            } );
            oTable = jQuery('#record').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            } );
            oTable = jQuery('#cadet_list').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            } );
            oTable = jQuery('#passed').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            } );								

            $('.carousel').carousel({
                interval: 4000
            })		

        });		
    </script>

    <!--datepicker -->
    <link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
    <script type="text/javascript" charset="utf-8">
        jQuery(function($){
            $(".Birthdate").datepicker();
        });
    </script>
    <!--datepicker -->

</head>
<body>
<?php include('nav-top1.php'); ?>
<div class="wrapper">

</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div id="element" class="hero-body-index">
    <div class="alert alert-info">
 	<p><font color=""><h2>Login</h2></font></p>
	Enter the details to login your account
    </div>

	<hr>
	<form method="POST" >
	<table>
    <tr><td><font color="">UserName:</font>&nbsp;&nbsp;</td><td><input type="text"  name="UserName" class="UserName_hover"></td></tr>
	<tr><td>...<td></tr>
    <tr><td><font color="">Password:</font>&nbsp;&nbsp;</td><td><input type="Password" name="Password" class="Password_hover"></td></tr>
	<tr><td>...<td></tr>
	<tr><td></td><td>	<button class="btn btn-primary btn-large" name="Login"><i class="icon-ok-sign icon-large"></i>&nbsp;Login</button></td></tr>
	<tr><td>
	</td><tr>
	</form>
	</table>
	
	</br>
	<div class="error">
	<?php

if (isset($_POST['Login'])){

$UserName=$_POST['UserName'];
$Password=$_POST['Password'];

$login_query=mysql_query("select * from user where UserName='$UserName' and Password='$Password' and User_Type='Admin'");
$count=mysql_num_rows($login_query);

$row=mysql_fetch_array($login_query);
$f=$row['FirstName'];
$l=$row['LastName'];

if ($count > 0){
session_start();
$_SESSION['id']=$row['User_id'];
$_SESSION['User_Type']=$row['User_Type'];
$type=$row['User_Type'];

mysql_query("INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysql_error());


header('location:home.php');
}else{
?>
    <div class="alert alert-error">
    <button class="close" data-dismiss="alert">×</button>
   Please check your UserName and Password
    </div>
<?php } 

}

?>	
</div>
</div>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<?php include('footer.php');?>


</div>
</body>
</html>