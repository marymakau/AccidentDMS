<?php
  require_once 'DbMysql.php';
  require_once 'AccidentData.php';
  require_once 'TempAccidentData.php';
  require_once 'User.php';

  function LoginUser(){
    $user = new User();     
    $loginUser = $user ->LoginUser($_POST['UserName'], $_POST['Password']);  
    return $loginUser;
  }

  function GetAccidentID(){
    $UserName = $_POST['UserName'];
    $tempAccidentData = new TempAccidentData();
    $curAccidentID = $tempAccidentData ->GetCurAccidentID($UserName);
    
    if($curAccidentID === FALSE){
      $accident = new AccidentData();
      $AccidentID = $accident -> GenerateAccidentID($UserName);        
      return [
          'STATUS'=> '1',
          'ACCIDENT_ID' => $AccidentID
      ];
    }
    else{
      return[
        'STATUS'=> '1',
        'ACCIDENT_ID' => $curAccidentID
      ];
    }
  }


function InsertAccidentID(){
     $Data = new AccidentData();
    try{      
         $clientData = [
           "UserName" => $_POST['UserName'],
           "AccidentID" => $_POST['AccidentID'],
           "data" => $_POST       
       ];
     $uploadData = $Data -> InsertAccidentData($clientData);
     return $uploadData;
    }
    catch(Exception $exp){
      return ['STATUS' => '0', 'MESSAGE' => 'Error occurred.'];
    } 
    
  }

  function GetAllGeneral(){
      $db = new MysqlDb();
      $sqlStr = "select * from general";
      return $db ->selectMultipleRow($sqlStr);
  }

  function FetchVehicleRegNumbers(){
      $db = new MysqlDb();
      $sqlStr = "select VehicleRegNumber from vehicles";
      $records = $db ->selectMultipleRow($sqlStr);        
      return $records;
  }

  function FetchDriverLicenceNum(){
      $db = new MysqlDb();
      $sqlStr = "select LicenceNumber from drivers";
      $records = $db ->selectMultipleRow($sqlStr);        
      return $records;
  }

  function GetVehicleDetailsByRegistration($VehicleRegNumber){
      $db = new MysqlDb();
      $VehicleRegNumber = $db -> escape($VehicleRegNumber);
      $sqlStr = "select * from Vehicles
          where(VehicleRegNumber = '$VehicleRegNumber')";        
      $records = $db ->selectSingleRow($sqlStr);
      return $records;        
  }


  function GetDriverDetailsByLicenceNum($LicenceNumber){
    $db = new MysqlDb();
    $LicenceNumber = $db -> escape($LicenceNumber);
    $sqlStr = "select * from drivers
        where(LicenceNumber = '$LicenceNumber')";        
    $records = $db ->selectSingleRow($sqlStr);
    return $records;        
  }

  function CacheNewAccidentData()
  { 
    $tempData = new TempAccidentData();
    try{      
         $clientData = [
           "UserName" => $_POST['UserName'],
           "AccidentID" => $_POST['AccidentID'],
           "formType" => $_POST['REQUEST_TYPE'],
           "data" => $_POST       
       ];
     $cacheData = $tempData -> InsertAccidentTempData($clientData);
     return $cacheData;
    }
    catch(Exception $exp){
      return ['STATUS' => '0', 'MESSAGE' => 'Error occurred.'];
    }  
  } 
  /**
   * Return Temporary data for accident forms
   */
  function GetAccidentForm(){
    $tempData = new TempAccidentData();
    $accidentID = $_POST['accidentID'];
    $formType  = $_POST['formType'];
    $tempData = new TempAccidentData();
    $formData = $tempData ->RetrieveAccidentTempData($accidentID, $formType);
    return $formData;
  }

?>