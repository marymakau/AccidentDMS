<?php
    require_once 'DbMysql.php';

    function FetchVehicleRegNumbers()
    {
        $db = new MysqlDb();
        $sqlStr = "select vehicleRegNumber from Vehicles";
        $records = $db ->selectMultipleRow($sqlStr);        
        return $records;
    }

    function GetVehicleOwnerByRegistration($vehicleRegNumber)
    {
        $db = new MysqlDb();
        $vehicleRegNumber = $db -> escape($vehicleRegNumber);
        $sqlStr = "select vehicleOwner from Vehicles
            where(vehicleRegNumber = '$vehicleRegNumber')";        
        $records = $db ->selectSingleRow($sqlStr);
        return $records;        
    }
    
    function GetAccidentCountByCounty($locationCounty)
    {        
        $db = new MysqlDb();
        $locationCounty = $db ->escape($locationCounty);
        $sqlStr = "select year(accidents.AccidentDate) as accidentYear, 
            count(accidents.AccidentID) as accidentCount
            from accidents join accidentlocation
            on accidents.AccidentID = accidentlocation.AccidentID
            where(accidentlocation.LocationCounty like '%$locationCounty%')
            group by year(accidents.AccidentDate)";
        
        $accidentData = $db ->selectMultipleRow($sqlStr);
        return $accidentData;
    }
    
    function GetAllCounties()
    {
        $db = new MysqlDb();
        $sqlStr = "select general.CountyName from general";
        return $db ->selectMultipleRow($sqlStr);
    }
?>