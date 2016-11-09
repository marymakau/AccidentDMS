   
        <link rel="stylesheet" href="css1/bootstrap.min.css"/>            
        <link rel="stylesheet" href="jqueryui/jquery-ui.min.css"/>
               
                 <div class="control-group">
                            <label class="control-label" for="input01">Reg. Number:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="regNumber" id="regNumber" autocomplete="off" value="<?php echo  $row['VehicleRegNumber']; ?>" list="regNumOpts">
                  <datalist id="regNumOpts">
                        
                    </datalist>
                            </div>     
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="input01">Vehicle Registered To:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="VehicleOwner" id="VehicleOwner" value="<?php echo  $row['VehicleOwner']; ?>" width='34' readonly>

                            </div>     
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="input01">Vehicle Owner ID:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="VehicleOwnerID" id="VehicleOwnerID" value="<?php echo  $row['OwnerID']; ?>" width='34' readonly>

                            </div>     
                        </div>
                 <div class="control-group">
                            <label class="control-label" for="input01">Vehicle Type:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="VehicleType" id="VehicleType" value="<?php echo  $row['VehicleType']; ?>" width='34' readonly>

                            </div>     
                        </div>
               <script src="js1/jquery.js"></script>
        <script src="js1/bootstrap.min.js"></script>
        <script src="jqueryui/jquery-ui.min.js"></script>
        <script>
            $(document).on('keyup blur focusout', '#regNumber', function(e){
                e.preventDefault();
                GetVehicleOwner();                
            });
            
            $(document).on('click', '.ui-autocomplete > .ui-menu-item > .ui-menu-item-wrapper', function(e){
                e.preventDefault();
                GetVehicleOwner(); 

            });
            
            function GetVehicleOwner()
            {
                $('#VehicleOwner').val('');               
                $('#VehicleType').val(''),
                $('#VehicleOwnerID').val('');
                var regNumber = $('#regNumber').val();
                var data = {
                    REQUEST_TYPE:'GET_OWNER_NAME',
                    regNumber:regNumber
                };
                
                var srvRqst = $.ajax({
                    url:'route.php',
                    data:data,
                    type:'post',
                    datatype:'json'   
                });
                
                srvRqst.done(function(srvResponse)
                {                   
                    var responseObj = $.parseJSON(srvResponse); 
                    
                    $('#VehicleOwner').val(responseObj['VehicleOwner']),
                    $('#VehicleType').val(responseObj['VehicleMake']+' '+responseObj['VehicleModel']),
                    $('#VehicleOwnerID').val(responseObj['OwnerID']);

                    
                }); 
            }
            
            GetAllRegNumbers();
            
            function GetAllRegNumbers()
            {
                var data = {
                    REQUEST_TYPE:'GET_ALL_REG_NUM'
                };
                
                var srvRqst = $.ajax({
                    url:'route.php',
                    data:data,
                    type:'post',
                    datatype:'json'   
                });
                
                srvRqst.done(function(srvResponse)
                {                    
                    var responseObj = $.parseJSON(srvResponse); 
                    var regNums = [];
                    var html = '';
                    for(var i = 0; i< responseObj.length; i++)
                    {
                        regNums.push(responseObj[i]['VehicleRegNumber']);
                    }
                    
                    $('#regNumber').autocomplete({
                        source:regNums
                    });
                });
            }
        </script>
    