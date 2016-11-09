
    
    <!-- Bootstrap -->
    
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
	
        
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 	
						  	<div class="control-group">
                            <label class="control-label" for="input01">Licence Number:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="LicenceNumber" id="LicenceNumber" value="<?php echo  $row['LicenceNumber']; ?>">

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Drive Name:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="CrashDriverName" id="CrashDriverName" value="<?php echo  $row['CrashDriverName']; ?>"readonly>

                            </div></div>
                            <div class="control-group">
                            <label class="control-label" for="input01">National ID:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="NationalIdNumber" id="NationalIdNumber" value="<?php echo  $row['NationalIdNumber']; ?>"readonly>

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Gender:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="DriverGender" id="DriverGender" value="<?php echo  $row['DriverGender']; ?>"readonly>

                            </div>     
                        </div><div class="control-group">
                            <label class="control-label" for="input01">Road Worth Status:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="DriverRoadWorthStatus" id="DriverRoadWorthStatus" value="<?php echo  $row['DriverRoadWorthStatus']; ?>"readonly>

                            </div>     
                        </div>
			             <div class="control-group">
                            <label class="control-label" for="input01">Licence Validity:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="DriverLicenceValidity" id="DriverLicenceValidity" value="<?php echo  $row['DriverLicenceValidity']; ?>"readonly>

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Age(Yrs):</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="DriverAge" id="DriverAge" value="<?php echo  $row['DriverAge']?>"readonly>

                            </div>     
                        </div>

                        <script src="js/auto.js"></script>
  
