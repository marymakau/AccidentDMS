<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
            
            case 'GET_ACCIDENT_DATA':
                $locationCounty = $_POST['locationCounty'];
                $response = GetAccidentCountByCounty($locationCounty);
                break;
            case 'GET_ALL_COUNTIES':
                $response = GetAllCounties();
                break;
        }        
        echo json_encode($response);
    }
?>