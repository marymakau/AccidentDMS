<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','accidentdms');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"accidentdms");
$sql="SELECT * FROM drivers WHERE LicenceNumber = '".$q."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
   $NationalIdNumber=$row['NationalIdNumber'];
    $_SESSION['FullName']=$row['FullName'];
    $Gender=$row['Gender'];
    $DOB=$row['DOB'];
    $LicenceIssueDate=$row['LicenceIssueDate'];
    $LicenceExpiryDate=$row['LicenceExpiryDate'];
    $RoadWorthStatus=$row['RoadWorthStatus'];
    ?>
    <div class="control-group">
                            <label class="control-label" for="input01">Drive Name:</label>
                            <div class="controls">
                         <input type="text" class="input-xlarge" name="CrashDriverName" id="input01" value="<?php echo  $row['FullName'] ?>"readonly>

                            </div>     
                        </div><?php
}
?>
</body>
</html>