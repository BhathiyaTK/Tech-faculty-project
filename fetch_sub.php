<?php

$host="localhost";
$db_name="root";
$db_pass= "";
$db="techfaculty_inventory";

$conn = new mysqli($host,$db_name,$db_pass,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['mainId'])) {
	$list_id = $_POST['mainId'];

	$sql = "SELECT * FROM sub_inventory WHERE sub_main_val=$list_id";
	$sql_results = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($sql_results)) {
	 	echo "<option value=".$row['sub_val'].">".$row['sub_name']."</option>";
	} 
	echo "<option value='N/A'>N/A</option>";
}

?>