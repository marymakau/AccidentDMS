<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author john
 */
require_once 'DbMysql.php';
class User {
    public function UserExistsByUserName($userName){
      $db = new MysqlDb();
      $userName = $db ->escape($userName);
      $sqlStr = "select exists(select 1 from user where(UserName = '$userName'))";
      return $db ->find($sqlStr);
    }
    public function LoginUser($userName, $password){
      if(!$this ->UserExistsByUserName($userName)){
        return ['STATUS' => '0', 'MESSAGE' => 'Username does not exist'];
      }
      $db = new MysqlDb();
      $userName = $db -> escape($userName);
      $sqlStr = "select User_id, UserName, Password, FirstName, LastName 
       from user where(Username = '$userName' and AccessLevel = '4')";
      $userData = $db ->selectSingleRow($sqlStr);
      
      if($userData['Password'] === $password)
      {
        $userData['STATUS'] = '1';
        $userData['login'] = '1';
        return $userData;
      }
      else{
        return [
            'STATUS' => '0', 
            'MESSAGE' => 'Wrong password.'            
        ];
      }      
    }
}
