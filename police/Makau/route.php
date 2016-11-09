<?php
    require_once 'Utils.php';
    $response = NULL;
    if(isset($_POST['REQUEST_TYPE']))
    {
        switch ($_POST['REQUEST_TYPE'])
        {
            case 'GET_ALL_REG_NUM':
                $response = FetchVehicleRegNumbers();
                break;
            
            case 'GET_OWNER_NAME':
                $vehicleRegNumber = $_POST['regNumber'];
                $response = GetVehicleOwnerByRegistration($vehicleRegNumber);
                break;
                
        }        
        echo json_encode($response);
    }
?>