<?php
require_once 'Config1.php';
class MysqlDb
{
  private $link;
  private $errorMsg;
  private $errorNum;
   
  function __construct() 
  {
    $this-> link = new mysqli(HOST, USER, PASSWORD, DATABASE, PORT);
    
    if($this-> link-> connect_errno)
    {
      $this-> errorMsg = "Could not connect to database: ".$this-> link-> error;
      $this-> errorNum = $this-> link-> errno;     
    }
    else
    {
      $this-> link -> set_charset("utf8");
      $this-> link -> query("SET SQL_MODE = '' ");
    }    
  }
  
  function __destruct()
  {
    $this-> link -> close();
  }
  
  public function executeMultiQuery($sqlStr)
  {
    if($this-> link->multi_query($sqlStr))
    {
        return TRUE;
    }
    else
    {      
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return FALSE;
    }
  }
  
  public function executeSingleQuery($sqlStr)
  {
    if($this-> link-> query($sqlStr))
    {
        return TRUE;
    }
    else
    {      
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return FALSE;
    }
  }
  
  /**
   * 
   * @param type array $table
   * @param type associative array $entityValDic
   * @return boolean
   */
  
  public function insertSingleRecord($table, $entityValDic)
  {
    $entitiesArry = array_keys($entityValDic);
    $entitiesStr = implode(", ", $entitiesArry);
    $entitiyValArr = array_values($entityValDic);
    $entitiesValStr = implode(", ", $entitiyValArr);
    $sqlStr = "insert into $table($entitiesStr) values($entitiesValStr)";    
    if($this-> link-> query($sqlStr))
    {
        return TRUE;
    }
    else
    {      
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return FALSE;
    }
  }
  
  /**
   * 
   * @param type $table
   * @param type an array $entityArr
   * @param type an array of arrays $entityValArr
   */
  public function insertMultipleRecords($table, $entityArr, $entityValArr)
  {
    $entityStr = implode(", ", $entityArr);  
    $valuesStr = "";
    
    $i = 0;
    $numOfRecords = count($entityValArr);
    
  
    foreach ($entityValArr as $value)
    {
      $entityValStr =  implode(", ", $value);
      $valuesStr .= "(".$entityValStr.")";
      if($numOfRecords !== ++$i)
      {
        $valuesStr .=", ";
      }      
    }    
    
    $sqlStr = "insert into $table($entityStr) values$valuesStr";
    
    if($this-> link-> query($sqlStr))
    {
        return TRUE;
    }
    else
    {      
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return FALSE;
    }
  }
  
  
  
  /**
  * find($sql_str = "")
  * @param string $sqlStr SQL query to execute. 
  * Format select exist(select 1 from table_name where(.....))
  * @return bool TRUE if found else FALSE  
  */
  public function find($sqlStr = "")
  {
    $exeRes = $this-> link-> query($sqlStr);
    
    if($exeRes)
    {
      $returnVal = FALSE;
      $result = $exeRes->fetch_row();
      switch($result[0])
      {
        case 1:
        case TRUE:                      
          $returnVal = TRUE;
          break;
        default:                    
          $returnVal = FALSE;
          break;
      }
      $exeRes-> close();
      return $returnVal;
    }
    else
    {   
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;      
    }
  }
  
  
  public function selectMultipleRow($sqlStr)
  {
    $resultObj= [];
    $exeRes = $this-> link-> query($sqlStr);
    if($exeRes)
    {
      while ($row = $exeRes-> fetch_assoc()) 
      {
          array_push($resultObj ,$row);
      }

      $exeRes-> close();        
      return $resultObj ;
    }
    else
    {   
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return false;
    }    
  }
  
  public function selectSingleRow($sqlStr)
  {
    
    $exeRes = $this-> link->query($sqlStr);
    if($exeRes)
    {
      $row = $exeRes-> fetch_assoc();
      return $row;
    }
    else
    {
      $this-> errorMsg = $this-> link-> error;
      $this-> errorNum = $this-> link-> errno;
      return false;
    }    
  }
 
    
  
  public function escape($str)
  {
    return $this->link-> real_escape_string($str);
  }

  public function countAffected()
  {
    return $this->link->affected_rows;
  }
  
  public function getErrorNum()
  {
    return $this-> errorNum;
  }
  
  public function getErrorMsg()
  {
    return $this-> errorMsg;             
  }    
  
  public function getLastID()
  {
    return $this -> link -> insert_id;
  }
}