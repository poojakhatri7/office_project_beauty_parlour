<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from category_service";

$query = mysqli_query($conn,$sql);
echo "pooja";
$str = '<option value="">Select Service</option>';
while ($row = mysqli_fetch_assoc($query) )
{
  echo $row['c_id'] ;
 echo  $row['c_service'];
    $str.="<option value= '{$row['c_id']}'>{$row['c_service']}";
}

echo $str;
?>