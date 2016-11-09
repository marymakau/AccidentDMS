<?php
  require_once 'DbMysql.php';
  class TempAccidentData {
    
    public function GetCurAccidentID($UserName){
       $db = new MysqlDb();
       $UserName = $db ->escape($UserName);
       $sqlStr = "select AccidentID 
          from trafficpoliceofficer
          where(JobID = '$UserName' and complete = '0')";  
       $AccidentID = $db ->selectSingleRow($sqlStr);
       if(strlen($AccidentID['AccidentID']) > 0 || $AccidentID['AccidentID'] != NULL)
       {
         return $AccidentID['AccidentID'];
       }
       else{
         return FALSE;
       }
     }
     
     public function UpdateAccidentTempData($accidentData)
     {
       $db = new MysqlDb();       
       $AccidentID = trim($accidentData['AccidentID']);
       $formType = trim($accidentData['formType']);
       $data = json_encode($accidentData);
       $sqlStr="update tempaccidentdata set data='$data' where formType='$formType' and AccidentID='$AccidentID'";
       $UpdateForm=$db->executeSingleQuery($sqlStr);
       if($UpdateForm == FALSE)
       {
         return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ];
       }
       else{
         return [
             'MESSAGE' => 'Accident details has been recorded.',             
             'STATUS'=> '1'
         ];
       } 
     }

    public function InsertAccidentTempData($accidentData){       
       $db = new MysqlDb();
       $UserName = trim($accidentData['UserName']);
       $AccidentID = trim($accidentData['AccidentID']);
       $formType = trim($accidentData['formType']);
       $data = json_encode($accidentData);
       if($this->ExistsAccidentTempData($AccidentID, $formType))
       {

        $UpdateForm=$this->UpdateAccidentTempData($accidentData);
        return $UpdateForm;
        
      }       
       $table = "tempaccidentdata";
       $entityDic = [
           "UserName" => "'$UserName'",
           "AccidentID" => "'$AccidentID'",
           "formType" => "'$formType'",
           "data" => "'$data'"       
       ];

       $insertData = $db ->insertSingleRecord($table, $entityDic);
       if($insertData == FALSE)
       {
         return [
             'MESSAGE' => 'Error occurred.',
             'ERROR_MSG' => $db ->getErrorMsg(),
             'STATUS'=> '0'
         ];
       }
       else{
         return [
             'MESSAGE' => 'Accident details has been recorded.',             
             'STATUS'=> '1'
         ];
       }       
     }
     

     private function ExistsAccidentTempData($accidentID, $formType){      
      $db = new MysqlDb();
      $sqlStr = "select exists(select 1 from tempaccidentdata 
        where(accidentID = '$accidentID' and formType = '$formType'))";
 
      return $db ->find($sqlStr);     
    }


    public function RetrieveAccidentTempData($accidentID, $formType){
      if(!$this ->ExistsAccidentTempData($accidentID, $formType))
      {
        return[
            'STATUS' => '0',
            'MESSAGE' => 'Data does not exist'
        ];
      }      
      
      $db = new MysqlDb();
      $accidentID = $db ->escape($accidentID);
      $formType = $db ->escape($formType);      
      $sqlStr = "select accidentID, formType,  data 
        from tempaccidentdata 
        where(accidentID = '$accidentID' and formType = '$formType')";
      $data = $db ->selectSingleRow($sqlStr);
      $accidentData = [
          'accidentID' => $data['accidentID'],
          'formType' => $data['formType'],
          'data' => json_decode($data['data'])
        ];
      return [
        'STATUS'=> '1',
        'DATA' => $accidentData
        ];
    }
    
    public function DeleteAccidentTempData($AccidentID){
      $db = new MysqlDb();
      $AccidentID = $db ->escape($AccidentID);
      $sqlStr = "delete from tempAccidentData 
           where (AccidentID = '$AccidentID')";
      $deleteData = $db ->executeSingleQuery($sqlStr);
      return $deleteData;
    }
  }
