<?php
    require_once 'DbMysql.php';

    
    
    function GetAccidentCountByYear($year)
    {        
        $db = new MysqlDb();
        $year = $db ->escape($year);
        $sqlStr = "select accidentlocation.LocationCounty as County,year(accidents.AccidentDate), 
            count(accidentlocation.AccidentID) as accidentCount
            from accidentlocation join accidents
            on accidentlocation.AccidentID = accidents.AccidentID
            where(year(accidents.AccidentDate) like '%$year%')
            group by accidentlocation.LocationCounty";
        
        $accidentData = $db ->selectMultipleRow($sqlStr);
        return $accidentData;
    }
    function GetAccidentYear()
    {        
        $db = new MysqlDb();
        $sqlStr = "select max(year(accidents.AccidentDate)) as maxyear,
        min(year(accidents.AccidentDate)) as minyear
            from accidents ";
        
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