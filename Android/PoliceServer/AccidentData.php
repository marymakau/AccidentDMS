<?php
require_once 'DbMysql.php';
class AccidentData {
 
  public function GenerateAccidentID($JobID){
    $db = new MysqlDb();
    $sqlStr = "select GenerateAccidentID('$JobID') as AccidentID";
    $exeRes = $db ->selectSingleRow($sqlStr);
    return $exeRes['AccidentID'];    
  }
    
  public function InsertAccidentData($accidentID){   
    $db = new MysqlDb();
   $ID = $accidentID['AccidentID'];
   $JobID=$accidentID['UserName'];
   $sqlStr="select * from user where (UserName='$JobID')";
   $exeRes = $db ->selectSingleRow($sqlStr);
  $FullName = $exeRes['FirstName'].' '.$exeRes['LastName'];
     //NEW_ACCIDENT_FORM
    $sqlStr1 = "select data 
       from tempaccidentdata
       where(accidentID = '$ID'
          and formType = 'NEW_ACCIDENT_FORM')";
    $exeRes1 = $db ->selectSingleRow($sqlStr1);
    $tempData1 = $exeRes1['data'];
    $data1 = json_decode($tempData1);
    $formData1 = $data1 -> data;

    $sqlStr2 = "select data 
       from tempaccidentdata
       where(accidentID = '$ID'
          and formType = 'ACCIDENT_DETAILS_FORM')";
    $exeRes2 = $db ->selectSingleRow($sqlStr2);
    $tempData2 = $exeRes2['data'];
    $data2 = json_decode($tempData2);
    $formData2 = $data2 -> data;

    $sqlStr3 = "select data 
       from tempaccidentdata
       where(accidentID = '$ID'
          and formType = 'VEHICLE_DETAILS_FORM')";
    $exeRes3 = $db ->selectSingleRow($sqlStr3);
    $tempData3 = $exeRes3['data'];
    $data3 = json_decode($tempData3);
    $formData3 = $data3 -> data;

    $sqlStr4 = "select data 
       from tempaccidentdata
       where(accidentID = '$ID'
          and formType = 'VEHICLE_DRIVER_DETAILS_FORM')";
    $exeRes4 = $db ->selectSingleRow($sqlStr4);
    $tempData4 = $exeRes4['data'];
    $data4 = json_decode($tempData4);
    $formData4 = $data4 -> data;

     $sqlStr5 = "select data 
       from tempaccidentdata
       where(accidentID = '$ID'
          and formType = 'POLICE_REMARKS_FORM')";
    $exeRes5 = $db ->selectSingleRow($sqlStr5);
    $tempData5 = $exeRes5['data'];
    $data5 = json_decode($tempData5);
    $formData5 = $data5 -> data;

    $latitude='-1.291757';
    $longitude='36.816485';
    $accidentID = $formData1 -> AccidentID;
    $locationCommonName = $formData1 -> areaName;
    $UserName=$formData1 -> UserName;
    $county=$formData1 -> county;   
    $accidentDate = date('Y-m-d H:i:s', strtotime($formData1 -> dateOfAccident.' '.$formData1 -> timeOfAccident));
    $vehicleNumber= $formData2 -> vehicleNumber;
    $severity=$formData2 -> severity;
    $weatherConditions=$formData2 -> weatherConditions;
    
    $hitAndRun=$formData2 -> hitAndRun;
    $illumination=$formData2 -> illumination;
    $roadSignsNearby=$formData2 -> roadSignsNearby;
    if($roadSignsNearby==''){$roadSignsNearby='None';}
    $accidentDescription=$formData2 -> accidentDescription;
    if($accidentDescription==''){$accidentDescription='Unrecorded';}
    $regNumber=$formData3 -> regNumber;
    $roadWorth=$formData3 -> roadWorth;
    $vehicleType=$formData3 -> vehicleType;
    $vehicleLoadSize=$formData3 -> vehicleLoadSize;
    $otherVehicleDefects=$formData3 -> other;
    if($otherVehicleDefects==''){$otherVehicleDefects='Unrecorded';}
    $insuarer=$formData3 -> insuarer;
    $ownerName=$formData3 -> ownerName;
    $vehicleMake=$formData3 -> vehicleMake;
    $vehicleModel=$formData3 -> vehicleModel;
    $policyNumber=$formData3 -> policyNumber;
    $coverExpired=$formData3 -> coverExpired;
    if($coverExpired=='Yes'){$PolicyCoverValidity='Expired';}
    if($coverExpired=='No'){$PolicyCoverValidity='Valid';}
    $otherpolicy=$formData3 -> otherpolicy;
    if($otherpolicy==''){$otherpolicy='Unrecorded';}
    $vehicleDefects=$formData3 -> vehicleDefects;
    $totalPassengers=$formData4 -> totalPassengers;
    $numberOfDeath=$formData4 -> numberOfDeath;
    $seriousInjury=$formData4 -> seriousInjury;
    $minorInjury=$formData4 -> minorInjury;
    $licenceNumber=$formData4 -> licenceNumber;
    $driverID=$formData4 -> driverID;
    $driverName=$formData4 -> driverName;
    $driverGender=$formData4 -> driverGender;
    $driverAge=$formData4 -> driverAge;
    $driverComments=$formData4 -> driverComments;
    if($driverComments==''){$driverComments='Unrecorded';}
    $driverSeriouslyInjured=$formData4 -> driverSeriouslyInjured;
    if($driverSeriouslyInjured=='Yes'){$driverInjury='Seriously Injured';}
    if($driverSeriouslyInjured=='No'){$driverInjury='Not Seriously Injured';}
    $driverDead=$formData4 -> driverDead;
    if($driverDead=='Yes'){$driverDeath='Dead';}
    if($driverDead=='No'){$driverDeath='Alive';}
    $driverDrunk=$formData4 -> driverDrunk;
    if($driverDrunk=='Yes'){$DriverAlcoholInfluence='Drunk';}
    if($driverDrunk=='No'){$DriverAlcoholInfluence='Not Drunk';}
    
    $policeSceneArrivalTime=$formData5 -> policeSceneArrivalTime;
    $accidentMainCause=$formData5 -> accidentMainCause;
    
    $PoliceRemarks=$formData5 -> generalRemarks;
    if($PoliceRemarks==''){$PoliceRemarks='Unrecorded';}

if($locationCommonName=='' || $county=='' || $formData1 -> timeOfAccident =='' || $formData1 -> dateOfAccident=='' || $totalPassengers==''
  || $severity=='' || $weatherConditions=='' || $vehicleNumber=='' || $hitAndRun=='' || $illumination=='' || $vehicleNumber==''
  || $vehicleType=='' || $vehicleLoadSize=='' || $insuarer=='' || $policyNumber=='' || $coverExpired=='' || !isset($vehicleDefects)
  || $numberOfDeath=='' || $seriousInjury=='' || $minorInjury=='' || $licenceNumber=='' || $driverSeriouslyInjured=='' || $driverDead==''
  || $driverDrunk=='' || $policeSceneArrivalTime=='' || !isset($accidentMainCause))

  {
     return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ];
  } 
else{
    
$columns1 = implode(", ",array_keys($weatherConditions));
$escaped_values1 = array_map('mysql_real_escape_string', array_values($weatherConditions));
$weatherConditions  = implode(", ", $escaped_values1);

$columns2 = implode(", ",array_keys($accidentMainCause));
$escaped_values = array_map('mysql_real_escape_string', array_values($accidentMainCause));
$accidentMainCause  = implode(", ", $escaped_values);

$columns3 = implode(", ",array_keys($vehicleDefects));
$escaped_values3 = array_map('mysql_real_escape_string', array_values($vehicleDefects));
$vehicleDefects  = implode(", ", $escaped_values3);

$sqlStr = "update accidents set LocationCommonName = '$locationCommonName', NoOfInvolvedVehicles='vehicleNumber',Severity='$severity',
        AccidentCauses= CONCAT('$accidentMainCause','|', ' Weather: $weatherConditions','|', ' Illumination: $illumination'),NumberOfDeaths='$numberOfDeath',NumberOfSeriouslyInjured='$seriousInjury',NoOfMicroInjured='$minorInjury',
        AccidentDescription='$accidentDescription',accidentDate = '$accidentDate',NoOfInvolvedVehicles='$vehicleNumber' 
        where(AccidentID = '$accidentID')";
    
 $UpdateForm=$db->executeSingleQuery($sqlStr);
if($UpdateForm == TRUE)
       {

if($this->ExistsAccidentDriverData($accidentID, $licenceNumber))
    {
$sqlStr="update accidentdriver set NationalIdNumber='$driverID',VehicleRegNumber='$regNumber',
           DriverSurvivalStatus='$driverDeath',DriverAge='$driverAge',DriverGender='$driverGender',DriverInjuryStatus='$driverInjury',
           DriverAlcoholInfluence='$DriverAlcoholInfluence',Comments='$driverComments' where LicenceNumber='$licenceNumber' AND AccidentID='$accidentID'";
$UpdateDriver=$db->executeSingleQuery($sqlStr); 
  if($UpdateDriver == TRUE){$nextVehicle='Yes';}

    } 
  else{
$sqlStr="insert into  accidentdriver (LicenceNumber,NationalIdNumber,AccidentID,VehicleRegNumber,DriverSurvivalStatus,DriverAge,DriverGender,DriverInjuryStatus,DriverAlcoholInfluence,Comments) 
    VALUES('$licenceNumber','$driverID','$accidentID','$regNumber','$driverDeath','$driverAge','$driverGender','$driverInjury','$DriverAlcoholInfluence','$driverComments')";
$InsertDriver=$db->executeSingleQuery($sqlStr);
  if($InsertDriver == TRUE){$nextVehicle='Yes';}
    }

if($nextVehicle='Yes')
{

if($this->ExistsAccidentVehicleData($accidentID, $regNumber))
{
 $sqlStr="update accidentvehicle set VehicleRegNumber='$regNumber',AccidentID='$accidentID',VehicleNumberOfOccupants='$totalPassengers',Deaths='$numberOfDeath',
          hitAndRun='$hitAndRun',SeriouslyInjured='$seriousInjury',MinorInjuries='$minorInjury',VehicleInsurer='$insuarer',InsuarancePolicyNumber='$policyNumber',
          OtherInsuarance='$otherpolicy',VehicleDefects='$vehicleDefects',VehicleRoadWorthStatus='$roadWorth',VehicleType='$vehicleType',VehicleMake='$vehicleMake',
          VehicleModel='$vehicleModel',VehicleLoad='$vehicleLoadSize',PolicyCoverValidity='$PolicyCoverValidity' where VehicleRegNumber='$regNumber' AND AccidentID='$accidentID'";
$UpdateVehicles=$db->executeSingleQuery($sqlStr);
if($UpdateVehicles == TRUE){$nextLocation='Yes';}
}
else{
$sqlStr="insert into  accidentvehicle (VehicleRegNumber,AccidentID,VehicleNumberOfOccupants,Deaths,hitAndRun,SeriouslyInjured,MinorInjuries,VehicleInsurer,InsuarancePolicyNumber,OtherInsuarance,VehicleDefects,VehicleRoadWorthStatus,VehicleType,VehicleMake,VehicleModel,VehicleLoad,PolicyCoverValidity) 
    VALUES('$regNumber','$accidentID','$totalPassengers','$numberOfDeath','$hitAndRun','$seriousInjury','$minorInjury','$insuarer','$policyNumber','$otherpolicy','$vehicleDefects','$roadWorth','$vehicleType','$vehicleMake','$vehicleModel','$vehicleLoadSize','$PolicyCoverValidity')";
$InsertVehicles=$db->executeSingleQuery($sqlStr);
 if($InsertVehicles == TRUE){$nextLocation='Yes';}
}}

if($nextLocation='Yes')
{
if($this->ExistsAccidentLocationData($accidentID))
{
$sqlStr="update accidentlocation set AccidentID='$accidentID',LocationLat='$latitude',LocationLong='$longitude',LocationCommonName='$locationCommonName',LocationCounty='$county'
 where AccidentID='$accidentID'";
$UpdateLocation=$db->executeSingleQuery($sqlStr);
if($UpdateLocation == TRUE){$nextPolice='Yes';}

}
else{
 $sqlStr="insert into  accidentlocation (AccidentID,LocationLat,LocationLong,LocationCommonName,LocationCounty) 
    VALUES('$accidentID','$latitude','$longitude','$locationCommonName','$county')";
$InsertLocation=$db->executeSingleQuery($sqlStr);
if($InsertLocation == TRUE){$nextPolice='Yes';}

}}
if($nextPolice='Yes')
{
$sqlStr="update trafficpoliceofficer set FullName='$FullName',AccidentMajorCause='$accidentMainCause',AccidentRemarks='$PoliceRemarks',complete=1
 where AccidentID='$accidentID' AND JobID='$JobID'";
$UpdatePolice=$db->executeSingleQuery($sqlStr);
if($UpdatePolice == FALSE){
  return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ]; }
         else{
          if($this->DeleteAccidentTempData($accidentID)){

         return[
            'STATUS' => '1',
            'MESSAGE' => 'recorded'
        ];}
        else{
          return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ];  
        }
       }

}
     
     }
      else{
         
          return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ];       }
       }
     }

  private function ExistsAccidentDriverData($accidentID, $licenceNumber){      
      $db = new MysqlDb();
      $sqlStr = "select exists(select * from accidentdriver 
        where(LicenceNumber='$licenceNumber' AND AccidentID='$accidentID'))";
 
      return $db ->find($sqlStr);     
    }
     private function ExistsAccidentVehicleData($accidentID, $regNumber){      
      $db = new MysqlDb();
      $sqlStr = "select exists(select * from accidentvehicle 
        where(VehicleRegNumber='$regNumber' AND AccidentID='$accidentID'))";
 
      return $db ->find($sqlStr);     
    }
     private function ExistsAccidentLocationData($accidentID){      
      $db = new MysqlDb();
      $sqlStr = "select exists(select * from accidentlocation 
        where(AccidentID='$accidentID'))";
 
      return $db ->find($sqlStr);     
    }
 private function UsersData($UserName){      
      $db = new MysqlDb();
      $sqlStr = "select * from user where UserName='$UserName'";
 
      return $db ->find($sqlStr);     
    }
     public function DeleteAccidentTempData($accidentID){
      $db = new MysqlDb();
      $accidentID = $db ->escape($accidentID);
      $sqlStr = "delete from tempaccidentdata 
           where (accidentID = '$accidentID')";
      $deleteData = $db ->executeSingleQuery($sqlStr);
      return $deleteData;
    }
}
