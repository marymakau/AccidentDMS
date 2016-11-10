<?php
  require_once 'DbMysql.php';
  
  $response = NULL;
  switch ($_POST['REQUEST_TYPE']){
    case 'GET_ACCIDENT_CORDINATES':  
      $response = GetAccidentCordinates();
      break;
    case 'SEARCH_FOR_ACCIDENT':
      $response = SearchForAccident();
      break;    
    case 'GET_LOCATIONS':
      $response = GetLocations();
      break;
    case 'GET_ACCIDENT_BY_ACCIDENT_ID':
      $response = GetAccidentByAccidentID();
      break;
  }
  
  echo json_encode($response);
  
  function GetAccidentCordinates(){
    $db = new MysqlDb();
    $sqlStr = "select * from accidentlocation 
    join accidents ON accidentlocation.AccidentID=accidents.AccidentID
    ";
    $accidentData  = $db ->selectMultipleRow($sqlStr);
    if(count($accidentData) > 0){
      return[
          'ACCIDENT_DATA' => $accidentData,
          'STATUS' => '1'
      ];
    }
    else{
      return [
          'STATUS' => '0'          
      ];
    }
  }
  
  function GetLocations(){
    $db = new MysqlDb();
    $sqlStr = "select LocationCommonName as location
       from  accidentlocation
       union
       select LocationCounty as location
       from accidentlocation";
    $locations = $db ->selectMultipleRow($sqlStr);
    
    if(count($locations) > 0)
    {
     return [
         'STATUS' => '1',
         'LOCATIONS' => $locations
     ]; 
    }     
    else{
      return ['STATUS' => '0'];
    }
  }
  
  function SearchForAccident(){
    $db = new MysqlDb();
    $searchVal = $db ->escape(trim($_POST['searchVal']));
    $sqlStr = "select *
      from accidentlocation 
      where LocationCommonName like '%$searchVal%' 
        or LocationCounty like '%$searchVal%'";
    
    $accidentData  = $db ->selectMultipleRow($sqlStr);
    if(count($accidentData) > 0){
      return[
          'ACCIDENT_DATA' => $accidentData,
          'STATUS' => '1'
      ];
    }
    else{
      return [
          'STATUS' => '0'          
      ];
    }    
  }
  
  function GetAccidentByAccidentID(){
    
  }