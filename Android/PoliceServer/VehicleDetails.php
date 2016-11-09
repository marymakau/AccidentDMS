<?php
  require_once 'DbMysql.php';
  class VehicleDetails {
    public function getExtraVehicleDetailsByRegNumber($regNumber)
    { 
     $db = new MysqlDb();       

      $regNumber=trim($regNumber);

      $sqlStr="select * from vehicles where VehicleRegNumber='$regNumber'";
      $vehicleData=$db->selectSingleRow($sqlStr);
      return $vehicleData;
    }
   
  }
