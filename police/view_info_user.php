<?php include('dbcon.php'); include('session.php');include('header.php');
    $get_id=$_GET['id'];
$q = intval($_GET['q']);

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

        <div id="element" class="hero-body-info" style='height:2000px'>


            <div class="alert alert-info">
                <h2>
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
                            JOIN drivers ON accidentdriver.LicenceNumber=drivers.LicenceNumber
                            JOIN vehicles ON accidentvehicle.VehicleRegNumber=vehicles.VehicleRegNumber
                         WHERE accidents.AccidentID='$get_id' AND accidents.AccidentID IS NOT NULL")or die(mysql_error());
                        $row=mysql_fetch_array($get_query);$id=$row['AccidentID'];

                    }else{
                        $get_query=mysql_query("SELECT * from accidents 
                            JOIN trafficpoliceofficer ON accidents.AccidentID=trafficpoliceofficer.AccidentID
                            JOIN accidentdriver ON accidents.AccidentID=accidentdriver.AccidentID
                            JOIN accidentlocation ON accidents.AccidentID=accidentlocation.AccidentID
                            JOIN accidentvehicle ON accidents.AccidentID=accidentvehicle.AccidentID
                            JOIN vehicles ON accidentvehicle.VehicleRegNumber=vehicles.VehicleRegNumber
                            JOIN drivers ON accidentdriver.LicenceNumber=drivers.LicenceNumber
                            WHERE accidents.AccidentID='$get_id' AND accidents.AccidentID IS NOT NULL")or die(mysql_error());
                        $row=mysql_fetch_array($get_query);$id=$row['AccidentID'];
                    }

                        echo 'Information for Accident ID'." ".$row['AccidentID']." ".'';

                    ?>
                </h2>
            </div>

            <hr>

            <div class="pull-right">  

                <a href="emp_profiles.php" class="btn btn-success btn-large"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
            </div>
            <br>
            <br>
            <br>
               
            <div class="pull-right">
                <div class="hero-unit-info"style="margin-right:10px; width:1000px;">
                    <div style="padding-left:400px;padding-bottom:20px;text-decoration:underline;"><b>General Accident Details</b></div>


                          <div class="row-fluid">
                        <div class="span12">                        
                          <div class="span4">Accident Date:<font color="orange"><b><?php echo $row['AccidentDate']; ?></b> </font></div>
                         <div class="span4">Location Name :<font color="orange"><b><?php echo $row['LocationCommonName']; ?></b> </font></div>
                        <div class="span4">Location County:<font color="orange"><b><?php echo $row['LocationCounty']; ?></b> </font></div>

                        </div>
                    </div>
                     <div class="row-fluid">
                        <div class="span12">                        
                         <div class="span42">Accident Description:<font color="orange"><b><?php echo $row['AccidentDescription']; ?></b> </font></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                       <div class="span4">No. of Vehicles Involved:<font color="orange"><b><?php echo $row['NoOfInvolvedVehicles']; ?></b> </font></div>
                        <div class="span4">Accident Severenity:<font color="orange"><b><?php echo $row['Severity']; ?></b> </font></div>
                        <div class="span4">Total Deaths:<font color="orange"><b><?php echo $row['NumberOfDeaths']; ?></b> </font></div>
                         </div></div>
                        <div class="row-fluid">
                        <div class="span12">
                       <div class="span4">Total Seriously injured:<font color="orange"><b><?php echo $row['NumberOfSeriouslyInjured']; ?></b> </font></div>
                        <div class="span4">Total Minor injured:<font color="orange"><b><?php echo $row['NoOfMicroInjured']; ?></b> </font></div>
                        </div>
                    </div>
                                       
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span6">Filing Date:<font color="orange"><b><?php echo $row['UploadDate']; ?></b> </font></div>
                       <div class="span6">Modification Date:<font color="orange"><b><?php echo $row['ModificationDate']; ?></b> </font></div>
                       </div></div>
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span12">Remarks:<font color="orange"><b><?php echo $row['Remarks']; ?></b> </font></div></div>
                    </div>
                    <?php for($i=0;$i<$row['NoOfInvolvedVehicles'];$i++) { ?>
                    <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Driver <?php $j=$i+1;echo $j;?>  Details</b></div>
                   <div class="row-fluid">
                        <div class="span12">
                       <div class="span4">Drive Name:<font color="orange"><b><?php echo $row['FullNames']; ?></b> </font></div>
                       <div class="span3">National ID:<font color="orange"><b><?php echo $row['NationalIdNumber']; ?></b> </font></div>
                        <div class="span3">Gender:<font color="orange"><b><?php echo $row['DriverGender']; ?></b> </font></div>
                         <div class="span2">Age:<font color="orange"><b><?php echo $row['DriverAge']; echo" Yrs"?></b> </font></div>

                    </div></div>
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span3">Licence Number:<font color="orange"><b><?php echo $row['LicenceNumber']; ?></b> </font></div>
                         <div class="span3">Licence Validity:<font color="orange"><b><?php echo $row['DriverLicenceValidity']; ?></b> </font></div>
                        <div class="span3">Death status :<font color="orange"><b><?php echo $row['DriverSurvivalStatus']; ?></b> </font></div></div>
                    </div><div class="row-fluid">
                        <div class="span12">
                        <div class="span8">Road Worth Status :<font color="orange"><b><?php echo $row['DriverRoadWorthStatus']; ?></b> </font></div>
                         <div class="span4">Alcohol Influence? <font color="orange"><b><?php echo $row['DriverAlcoholInfluence']; ?></b> </font></div></div>
                    </div>
                        <div class="row-fluid">
                        <div class="span12">
                        <div class="span42">Comments :<font color="orange"><b><?php echo $row['Comments']; ?></b> </font></div></div>
                    </div>

                    <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Vehicle <?php $j=$i+1;echo $j;?> Details</b></div>
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span4">Reg. Number:<font color="orange"><b><?php echo $row['VehicleRegNumber']; ?></b> </font></div>
                        <div class="span4">Vehicle Type:<font color="orange"><b><?php echo $row['VehicleType']; ?></b> </font></div>
                        <div class="span4">Number of occupants:<font color="orange"><b><?php echo $row['VehicleNumberOfOccupants']; ?></b> </font></div>

                        </div>
                    </div>
                     <div class="row-fluid">
                        <div class="span12">
                        <div class="span4">Vehicle Registered To:<font color="orange"><b><?php echo $row['VehicleOwner']; ?></b> </font></div>
                         <div class="span4">Owner National ID:<font color="orange"><b><?php echo $row['OwnerID']; ?></b> </font></div>
                        <div class="span4">Inspection Certificate:<font color="orange"><b><?php echo $row['InspectionCertificate']; ?></b> </font></div>
                        </div>
                    </div>
                     <div class="row-fluid">
                        <div class="span12">
                        <div class="span42">Vehicle Defects:<font color="orange"><b><?php echo $row['VehicleDefects']; ?></b> </font></div>
                        </div>
                    </div>    
                      <div class="row-fluid">
                        <div class="span12">
                        <div class="span4">No. of Deaths:<font color="orange"><b><?php echo $row['Deaths']; ?></b> </font></div>
                       <div class="span4">No. of Seriously injured:<font color="orange"><b><?php echo $row['SeriouslyInjured']; ?></b> </font></div>
                        <div class="span4">No. of Minor injured:<font color="orange"><b><?php echo $row['MinorInjuries']; ?></b> </font></div>

                        </div></div>
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span4">Insurer:<font color="orange"><b><?php echo $row['VehicleInsurer']; ?></b> </font></div>
                       <div class="span4">Policy Number:<font color="orange"><b><?php echo $row['InsuarancePolicyNumber']; ?></b> </font></div>
                       <div class="span4">Insuarance Status:<font color="orange"><b><?php echo $row['InsuaranceStatus']; ?></b> </font></div>

                        </div>
                    </div><?php }?>

                    <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Casualty Details</b></div>


                        <div class="row-fluid">
                        <div class="span12">
                       <div class="span4">Full Names:<font color="orange"><b><?php echo $row['CasualtyName']; ?></b> </font></div>
                        <div class="span3">Gender:<font color="orange"><b><?php echo $row['CasualtyGender']; ?></b> </font></div>
                         <div class="span2">Age Group:<font color="orange"><b><?php echo $row['AgeGroup']; echo" Yrs"?></b> </font></div>

                        </div>
                    </div><div class="row-fluid">
                        <div class="span12">
                        <div class="span4">Nationality:<font color="orange"><b><?php echo $row['Nationality']; ?></b> </font></div>
                        <div class="span4">Injury Type:<font color="orange"><b><?php echo $row['InjuryType']; ?></b> </font></div>

                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                         <div class="span42">Current Medical Condition:<font color="orange"><b><?php echo $row['CurrentMedicalCondition']; ?></b> </font></div>
                      </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                        <div class="span6">Filing Date:<font color="orange"><b><?php echo $row['InfoFilingDate']; ?></b> </font></div>
                       <div class="span6">Modification Date:<font color="orange"><b><?php echo $row['InfoModificationDate']; ?></b> </font></div>
                       </div>
                    </div>

                    
                </div>

            </div>
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
        
        

    