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
<script>
function myFunction()
{
 value1 = parseInt(document.getElementById("value1").value);
 value2 = parseInt(document.getElementById("value2").value);
    if(!value1==""&&!value2=="")
    {
     sum = value1 + value2;
     document.getElementById("NumberOfDeaths").value = sum;
    }
}
</script><!--




  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    
    
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
-->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-carousel.js"></script>
    <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
    <script type="text/javascript" src="js/bootstrap-popover.js"></script>
    <script type="text/javascript" src="js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="scripts/swfobject/swfobject.js"></script>
    <style type="text/css">.control-group {
    display: inline-block;
    vertical-align: top;
}

.keep-on-line {
    white-space: nowrap;
}</style>
    <!----hover pop up -->
    <script src="js/main.js" typ.control-group {
    display: inline-block;
    vertical-align: top;
}

.keep-on-line {
    white-space: nowrap;
}e="text/javascript"></script>
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