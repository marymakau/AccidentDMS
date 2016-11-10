<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once 'Utils.php';
    $response = NULL;
    if(isset($_POST['REQUEST_TYPE']))
    {
        switch ($_POST['REQUEST_TYPE'])
        {
                        
            case 'GET_ACCIDENT_DATA':
                $year = $_POST['year'];
                $response = GetAccidentCountByYear($year);
                break;
                case 'GET_YEARS':
                $response = GetAccidentYear();
                break;
            
        }        
        echo json_encode($response);
    }
?>