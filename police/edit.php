<?php include('dbcon.php'); include('session.php');include('header.php');
    $get_id=$_GET['id'];

?>
<body>
  <?php include('nav-top.php'); ?>
    <div class="navbar navbar-fixed-top1">
        <div class="navbar-inner">
            <div class="container">
                <div class="marg">
                    <ul class="nav">
                          <li>
                            <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
                        </li>
                        <li class="active"><a href="emp_profiles.php"><i class="icon-warning-sign icon-large"></i>Accidents</a></li>
                        
                        <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
                        <form  method="POST" action="search_user.php" class="navbar-search pull-right">
                            <input type="text" name="search" class="search-query" placeholder="Search">
                        </form>



                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div id="element" class="hero-body-add" style='height:1500px'>



            <div class="alert alert-info">
                <h2>Edit 
                    <?php
                     $get_query1=mysql_query("SELECT * from casualty WHERE AccidentID='$get_id'")or die(mysql_error());
                      $row1=mysql_fetch_array($get_query1);$id1=$row1['AccidentID'];
                      if($id1!=''){

                        $get_query=mysql_query("SELECT * from accidents 
                            JOIN trafficpoliceofficer ON accidents.AccidentID=trafficpoliceofficer.AccidentID
                            JOIN accidentdriver ON accidents.AccidentID=accidentdriver.AccidentID
                            JOIN accidentlocation ON accidents.AccidentID=accidentlocation.AccidentID
                            JOIN accidentvehicle ON accidents.AccidentID=accidentvehicle.AccidentID
                            JOIN casualty ON accidents.AccidentID=casualty.AccidentID

                         WHERE accidents.AccidentID='$get_id' AND accidents.AccidentID IS NOT NULL")or die(mysql_error());
                        $row=mysql_fetch_array($get_query);$id=$row['AccidentID'];

                    }else{
                        $get_query=mysql_query("SELECT * from accidents 
                            JOIN trafficpoliceofficer ON accidents.AccidentID=trafficpoliceofficer.AccidentID
                            JOIN accidentdriver ON accidents.AccidentID=accidentdriver.AccidentID
                            JOIN accidentlocation ON accidents.AccidentID=accidentlocation.AccidentID
                            JOIN accidentvehicle ON accidents.AccidentID=accidentvehicle.AccidentID
                            WHERE accidents.AccidentID='$get_id' AND accidents.AccidentID IS NOT NULL")or die(mysql_error());
                        $row=mysql_fetch_array($get_query);$id=$row['AccidentID'];
                    }
                      echo 'Information for Accident ID'." ".$row['AccidentID']." ".'';

                    ?>
                </h2>  

                <div class="pull-right">
                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            $('#add').popover('show')
                            $('#add').popover('hide')

                        });
                    </script>

                </div> 
            </div>

<div class="pull-right">  

                <a href="emp_profiles.php" class="btn btn-success btn-large"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
            </div>




            <!-- Para sa tabs -->



            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home"><font color="#5bc0de">Accident Info</font></a></li>

            </ul>
            <form method="post" enctype="multipart/form-data">
                <div class="tab-content">

                    <div class="tab-pane active" id="home">

                        <div class="hero-unit">
                            <?php
                                include('add_edit_info.php');  
                            ?>
                        </div>

                    </div>




                    <center>
                        <button class="btn btn-primary btn-large" name="save"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                    </center>   

                </div>   
            </form>

            <script>

                jQuery(document).ready(function() {
                    $('#myTab a').click(function (e) {
                        e.preventDefault();
                        $(this).tab('show');
                    })

                    $(function () {
                        $('#myTab a:first').tab('show');
                    })
                })
            </script>


            <!-- end ka tab -->







        </div>    

        <?php include('footer.php');?>
    </div>
</body>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">?</button>
        <h3> </h3>
    </div>
    <div class="modal-body">
        <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">No</a>
        <a href="logout.php" class="btn btn-primary">Yes</a>
    </div>
</div>


<?php

    if (isset($_POST['save'])){

        $surname=$_POST['surname'];
        $firstname=$_POST['firstname'];
        $middlename=$_POST['middlename'];
        $sex=$_POST['sex'];
        $Date_of_Birth=$_POST['Birth_date'];
        $birth_place=$_POST['birth_place'];
        $civil_status=$_POST['civil_status'];
        $citizenship=$_POST['citizenship'];
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $blood_type=$_POST['blood_type'];
        $gsis=$_POST['gsis'];
        $pag_ibig=$_POST['pag_ibig'];
        $PHILHEALTH=$_POST['PHILHEALTH'];
        $SSS=$_POST['SSS'];
        $Authorized_Salary=$_POST['Authorized_Salary'];
        $Actual_Salary=$_POST['Actual_Salary'];
        $step=$_POST['step'];
        $Status=$_POST['Status'];
        $Civil_Service_Eligibility=$_POST['Civil_Service_Eligibility'];
        $Remarks=$_POST['Remarks'];
        $Residential_Address=$_POST['Residential_Address'];
        $ZIP_CODE1=$_POST['ZIP_CODE1'];
        $Telephone_NO=$_POST['Telephone_NO'];
        $Permanent_Address=$_POST['Permanent_Address'];
        $ZIP_CODE2=$_POST['ZIP_CODE2'];

        $Email_Address=$_POST['Email_Address'];
        $Cellphone_NO=$_POST['Cellphone_NO'];
        $Agency_Employee_NO=$_POST['Agency_Employee_NO'];
        $tin=$_POST['tin'];
        $Item_Number=$_POST['Item_Number'];

        $Position=$_POST['Position'];
        $Area_Code=$_POST['Area_Code'];
        $Area_Type=$_POST['Area_Type'];
        $ATTRIBUTION=$_POST['ATTRIBUTION'];
        $school=$_POST['school'];
        $Employee_No=$_POST['Employee_No'];

		$qualification=$_POST['qualification'];	
		$Classification=$_POST['Classification']; 
        $District=$_POST['District']; 
              
              


        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= addslashes($_FILES['image']['name']);
        $image_size= getimagesize($_FILES['image']['tmp_name']);


        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);            
        $location="upload/" . $_FILES["image"]["name"];


        mysql_query("update employee set LastName='$surname',FirstName='$firstname',MiddleName='$middlename',
            Residential_Address='$Residential_Address',ZIP_CODE1='$ZIP_CODE1',Telephone_NO='$Telephone_NO',
            Permanent_Address='$Permanent_Address',ZIP_CODE2='$ZIP_CODE2',Email_Address='$Email_Address',
            Cellphone_NO='$Cellphone_NO',Agency_Employee_NO='$Agency_Employee_NO',tin='$tin',
            Item_Number='$Item_Number',Position='$Position',Area_Code='$Area_Code',Area_Type='$Area_Type',
            ATTRIBUTION='$ATTRIBUTION',School='$school',Date_of_Birth='$Date_of_Birth',birth_place='$birth_place',
            Sex='$sex',civil_status='$civil_status',citizenship='$citizenship',height='$height',weight='$weight',
            blood_type='$blood_type',gsis='$gsis',pag_ibig='$pag_ibig',PHILHEALTH='$PHILHEALTH',SSS='$SSS',
            Authorized_Salary='$Authorized_Salary',Actual_Salary='$Actual_Salary',step='$step',Status='$Status',
            Civil_Service_Eligibility='$Civil_Service_Eligibility',Remarks='$Remarks',location='$location',
            Employee_No='$Employee_No',Classification='$Classification',District='$District',qualification='$qualification'     

            where employeeID='$get_id'")or die(mysql_error());



        header('location:emp_profiles.php');

    }


?>