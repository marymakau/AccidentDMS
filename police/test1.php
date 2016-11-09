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
$q= intval($_GET['q']);
echo $q;
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}mysqli_select_db($con,"accidentdms");
$sql="SELECT * FROM vehicles WHERE VehicleRegNumber = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['VehicleMake'] . "</td>";
    echo "<td>" . $row['VehicleModel'] . "</td>";
    echo "<td>" . $row['VehicleEngineCapacity'] . "</td>";
    echo "<td>" . $row['VehicleOwner'] . "</td>";
    echo "<td>" . $row['OwnerGender'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>