<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'config.php';
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT * FROM drivers where UPPER(LicenceNumber) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
$issue=$row['LicenceIssueDate'];
$expiry=$row['LicenceExpiryDate'];
$date1= date("Y-m-d ", strtotime("-3 years", strtotime($expiry.' + 2 days')));
$date2=date("Y-m-d ", strtotime("-3 years", strtotime($expiry.' - 3 days')));
$date3= date("Y-m-d ", strtotime("-1 years", strtotime($expiry.' + 2 days')));
$date4=date("Y-m-d ", strtotime("-1 years", strtotime($expiry.' - 3 days')));
$startdate = $row['LicenceExpiryDate'];
$expire = strtotime($startdate. ' + 1 days');
$today = strtotime("today midnight");
$enddate=$row['LicenceIssueDate'];
$valid = strtotime($enddate. ' - 1 days');
if($today <= $valid)
{
 $DriverLicenceValidity='Fake';

}else{
 if(($issue>=$date2 && $issue<=$date1)||($issue>=$date4 && $issue<=$date3))

 {
if($today >= $expire){
   $DriverLicenceValidity='Expired';
} 
else {
    $DriverLicenceValidity="Valid";
}
 }
 else{ 
 	   $DriverLicenceValidity='Fake';

}	}	

$DriverAge=date_diff(date_create($row['DOB']), date_create('today'))->y;


		$name = $row['LicenceNumber'].'|'.$row['NationalIdNumber'].'|'.$row['Gender'].'|'.$row['FullName'].'|'.$row['RoadWorthStatus'].'|'.$DriverLicenceValidity.'|'.$DriverAge.'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}


