<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">

            <?php
                   
                   $get_id='ACC_20140220_010011';
                    $get_query1=mysql_query("SELECT * from casualty WHERE AccidentID='$get_id'")or die(mysql_error());
                      $row1=mysql_fetch_array($get_query1);$id1=$row1['AccidentID'];
                      if($id1!=''){

                        $get_query=mysql_query("SELECT * from accidents 
                            JOIN trafficpoliceofficer ON accidents.AccidentID=trafficpoliceofficer.AccidentID
                            JOIN accidentdriver ON accidents.AccidentID=accidentdriver.AccidentID
                            JOIN accidentlocation ON accidents.AccidentID=accidentlocation.AccidentID
                            JOIN accidentvehicle ON accidents.AccidentID=accidentvehicle.AccidentID
                            JOIN casualty ON accidents.AccidentID=casualty.AccidentID
                            JOIN vehicles ON accidentvehicle.VehicleRegNumber=vehicles.VehicleRegNumber
                            JOIN drivers ON accidentdriver.LicenceNumber=drivers.LicenceNumber

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

          
                
            ?>
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function country() {
    $(".autoCounty").autocomplete({source: "searchCounty.php",minLength: 1 }); });
$(function desc() {
    $(".autoDesc").autocomplete({source: "searchDesc.php", minLength: 1 });  });
$(function severe() {
    $(".autoSevere").autocomplete({ source: "searchSevere.php", minLength: 1}); });
$(function Alive() {
    $(".autoAlive").autocomplete({ source: "searchAlive.php", minLength: 1}); });
$(function license() {
    $(".autoLicense").autocomplete({ source: "searchLicense.php", minLength: 1}); });
$(function Alcohol() {
    $(".autoAlcohol").autocomplete({ source: "searchAlcohol.php", minLength: 1}); });
$(function Age() {
    $(".autoAge").autocomplete({ source: "searchAge.php", minLength: 1}); });
$(function Gender() {
    $(".autoGender").autocomplete({ source: "searchGender.php", minLength: 1}); });
</script>
            
                <div class="form-horizontal">
                    <fieldset>
                    <div class="keep-on-line">

                    <div style="padding-left:300px;padding-bottom:20px;text-decoration:underline;"><b>General Accident Details</b></div>

                         <div class="control-group">
                            <label class="control-label" for="input01">Accident ID:</label>
                            <div class="controls">
                                <input type="text" value="<?php echo  $row['AccidentID']; ?>"  name="AccidentID" class="input-xlarge" id="input01" readonly>

                            </div>     
                        </div>
                    
                        <div class="control-group">
                            <label class="control-label" for="input01">Accident Date:</label>
                            <div class="controls">
                                <input type="text" value="<?php echo  $row['UploadDate']; ?>"  name="UploadDate" class="input-xlarge" id="input01" readonly>

                            </div>     
                        </div></div>

                        <div class="control-group">
                            <label class="control-label"  for="input01">Location Name:</label>
                            <div class="controls">
                                <input type="text" value="<?php echo  $row['LocationCommonName']; ?>" name="LocationCommonName" class="input-xlarge" id="input01" required >

                            </div>     
                        </div>

                        <div class="control-group">
                            <label class="control-label"  for="input01">Location County:</label>
                            <div class="controls">
                            <form action='' method='post'>
                            <input type='text' value="<?php echo  $row['LocationCounty']; ?>" name="LocationCounty" class="autoCounty" id="input01" onkeyup="county()" required>
                            </form>
                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label"  for="input01">Accident Description:</label>
                            <div class="controls">
                                 <form action='' method='post'>
                            <input type='text' value="<?php echo  $row['AccidentDescription']; ?>" name="AccidentDescription" class="autoDesc" id="input01" onkeyup="Desc()" required>
                            </form>
                            </div>     
                        </div>



                        <div class="control-group"style='padding-left:90px'>
                            <label class="control-label" for="input01"style='width:150px;padding-left:10px'>No. of Vehicles Involved:</label>
                            <div class="controls">
                                <input type="number"  value="<?php echo  $row['NoOfInvolvedVehicles']; ?>"  name="Residential_Address" id="input01"readonly>

                            </div>     
                        </div>


                       <div class="control-group">
                            <label class="control-label"  for="input01">Accident Severenity:</label>
                            <div class="controls">
                            <form action='' method='post'>
                            <input type='text' value="<?php echo  $row['Severity']; ?>" name="Severity" class="autoSevere" id="input01" onkeyup="severe()" required>
                            </form>
                            </div>     
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="input01">Total Deaths:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="NumberOfDeaths" id="input01" value="<?php echo  $row['NumberOfDeaths']; ?>"readonly>

                            </div>     
                        </div>
                                                                                                                            
                        <div class="control-group">
                            <label class="control-label" for="input01">Total Seriously injured:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="NumberOfSeriouslyInjured" id="input01"  value="<?php echo  $row['NumberOfSeriouslyInjured']; ?>"readonly>

                            </div>     
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="input01">Total Minor injured:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="NoOfMicroInjured" id="input01" value="<?php echo  $row['NoOfMicroInjured']; ?>" readonly>

                            </div>     
                        </div><div class="control-group">
                            <label class="control-label" for="input01">Filing Date:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="UploadDate" id="input01" value="<?php echo  $row['UploadDate']; ?>"readonly>

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Modification Date:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="ModificationDate" id="input01" value="<?php echo  $row['ModificationDate']; ?>"readonly>

                            </div>     
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input01">Remarks:</label>
                            <div class="controls">
                                <textarea style="width: 698px; height: 54px;" name="Remarks"required><?php echo  $row['Remarks']; ?></textarea>

                            </div>     
                        </div>
                    <?php for($i=0;$i<$row['NoOfInvolvedVehicles'];$i++) { ?>
                    <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Driver <?php $j=$i+1;echo $j;?>  Details</b></div>
                           <?php

                           include('driver.php');?> 
                            <div class="control-group">
                            <label class="control-label" for="input01">Death status:</label>
                            <div class="controls">
                            <input type='text' value="<?php echo  $row['DriverSurvivalStatus']; ?>" name="DriverSurvivalStatus" class="autoAlive" id="DriverSurvivalStatus" onkeyup="Alive()" required>

                            </div>     
                        </div><div class="control-group">
                            <label class="control-label" for="DriverAlcoholInfluence">Alcohol Influence?</label>
                            <div class="controls">
                            <input type='text' value="<?php echo  $row['DriverAlcoholInfluence']; ?>" name="DriverAlcoholInfluence" class="autoAlcohol" id="DriverAlcoholInfluence" onkeyup="Alcohol()" required>

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Comments:</label>
                            <div class="controls">
                                <textarea style="width: 698px; height: 54px;" name="Comments"required><?php echo  $row['Comments']; ?></textarea>

                            </div>     
                        </div>
                      <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Vehicle <?php $j=$i+1;echo $j;?> Details</b></div>
                        
                    <?php include('vehicleForm.php');
                }
                    ?>
                    <div style="padding-left:300px;padding-top:20px;padding-bottom:20px;text-decoration:underline;"><b>Casualty Details</b></div>

                   <div class="control-group">
                            <label class="control-label" for="CasualtyName">Full Names</label>
                            <div class="controls">
                             <input type="text" class="input-xlarge" name="CasualtyName" id="input01" value="<?php echo  $row['CasualtyName']; ?>"required>

                            </div>     
                        </div>

                            <div class="control-group">
                            <label class="control-label" for="CasualtyGender">Gender:</label>
                            <div class="controls">
                            <input type='text' value="<?php echo  $row['CasualtyGender']; ?>" name="CasualtyGender" class="autoGender" id="CasualtyGender" onkeyup="Gender()" required>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="AgeGroup">Age Group:</label>
                            <div class="controls">
                            <input type='text' value="<?php echo  $row['AgeGroup']; ?>" name="AgeGroup" class="autoAge" id="AgeGroup" onkeyup="Age()" required>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="input01">Nationality:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="Nationality" id="input01" value="<?php echo  $row['Nationality']; ?>"required>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="input01">Injury Type:</label>
                            <div class="controls">
                                <textarea style="width: 698px; height: 54px;" name="InjuryType"required><?php echo  $row['InjuryType']; ?></textarea>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="input01">Current Medical Condition:</label>
                            <div class="controls">
                                <textarea style="width: 698px; height: 54px;" name="CurrentMedicalCondition"required><?php echo  $row['CurrentMedicalCondition']; ?></textarea>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="input01">Filing Date:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="InfoFilingDate" id="input01" value="<?php echo  $row['InfoFilingDate']; ?>"readonly>

                            </div>     
                        </div> <div class="control-group">
                            <label class="control-label" for="input01">Modification Date:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="InfoModificationDate" id="input01" value="<?php echo  $row['InfoModificationDate']; ?>"readonly>

                            </div>     
                        </div> 
                    </fieldset>
                </div>

            </div>
            