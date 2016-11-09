<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once 'Utils.php';
    require_once 'VehicleDetails.php';
    $response = NULL;
    
    if(!isset($_SESSION))
    {
      session_start();
    }
    
    if(isset($_POST['REQUEST_TYPE']))
    {
        switch ($_POST['REQUEST_TYPE'])
        {           
          case 'LOGIN_USER':
            $response = LoginUser();
            break;
          
          case 'GET_ACCIDENT_ID':
            $response = GetAccidentID();
            break;
          case 'GET_ALL_GENERAL':
              $response = GetAllGeneral();
              break;

          case 'GET_ALL_REG_NUM':
            $response = FetchVehicleRegNumbers();
            break;

          case 'GET_ALL_LICENCE_NUM':
          $response = FetchDriverLicenceNum();
          break;

          case 'GET_VEHICLE_DETAILS':
          $vehicleRegNumber = $_POST['regNumber'];
          $response = GetVehicleDetailsByRegistration($vehicleRegNumber);
          break;

          case 'GET_EXTRA_VEHICLE_DETAILS':
          $vehicleDetails=new  VehicleDetails;
          $response=$vehicleDetails->getExtraVehicleDetailsByRegNumber($_POST['regNumber']);
          break;

          case 'GET_DRIVER_DETAILS':
          $Licence = $_POST['licenceNumber'];
          $response = GetDriverDetailsByLicenceNum($Licence);
          break;
          
          case 'NEW_ACCIDENT_FORM':
          case 'ACCIDENT_DETAILS_FORM':
          case 'VEHICLE_DETAILS_FORM':
          case 'VEHICLE_DRIVER_DETAILS_FORM':
          case 'VEHICLE_DETAILS_2_FORM':
          case 'POLICE_REMARKS_FORM':
            $response = CacheNewAccidentData();
            break; 

          case 'ALL_ACCIDENT_DETAILS':
          
            $response = InsertAccidentID();
            break;

          case 'GET_ACCIDENT_FORM_DATA':
            $response = GetAccidentForm();
            break;
        }  
        echo json_encode($response);
    }
?>