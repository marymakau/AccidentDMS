<!DOCTYPE html>
<html lang="en">
    <head>   
        <link rel="stylesheet" href="css1/bootstrap.min.css"/>            
        <link rel="stylesheet" href="jqueryui/jquery-ui.min.css"/>
    </head>
    <body>
        <div class="row">             
            <div class = "panel panel-default col-lg-offset-4 col-lg-4">
                <div class="panel-heading">
                  <h4 class="text-center">Vehicle search.</h4>
                </div>
                <div class="panel-body">
                <form class="form-vertical" 
                   autocomplete="off"
                   name="searchForm"
                   id="searchForm">      
                  <div class="text-center" id="searchResponse"></div>
                  <br>
                  <div class="form-group">           
                    <input type="text"
                      class="form-control"
                      id="regNumber"
                      name="regNumber"
                      autocomplete="off"
                      placeholder="Registration number"
                      list="regNumOpts">   
                    <datalist id="regNumOpts">
                        
                    </datalist>
                    <span class="text-danger" id="regNumberResponse"></span>
                  </div> 
                  <div class="form-group">            
                    <input type="text"
                      class="form-control"
                      id="VehicleOwner"
                      name="VehicleOwner"
                      placeholder="Vehicle owner">
                      <input type="text"
                      class="form-control"
                      id="VehicleOwnerID"
                      name="VehicleOwnerID"
                      placeholder="Vehicle owner ID"> 
                      <input type="text"
                      class="form-control"
                      id="VehicleType"
                      name="VehicleType"
                      placeholder="Vehicle type">             
                     <span class="text-danger" id="VehicleOwnerResponse"></span>
                  </div> 
                    
                         
                </form>
               </div>
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
    </body>
</html>