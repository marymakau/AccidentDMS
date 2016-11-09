<?php
    require_once 'DbMysql.php';

    function FetchVehicleRegNumbers()
    {
        $db = new MysqlDb();
        $sqlStr = "select VehicleRegNumber from vehicles";
        $records = $db ->selectMultipleRow($sqlStr);        
        return $records;
    }

    function GetVehicleOwnerByRegistration($VehicleRegNumber)
    {
        $db = new MysqlDb();
        $VehicleRegNumber = $db -> escape($VehicleRegNumber);
        $sqlStr = "select * from Vehicles
            where(VehicleRegNumber = '$VehicleRegNumber')";        
        $records = $db ->selectSingleRow($sqlStr);
        return $records;        
    }

?>