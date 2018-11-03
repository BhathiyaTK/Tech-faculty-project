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

if (isset($_POST['locationId'])) {
	$location_id = $_POST['locationId'];

	if (($location_id == "A") || ($location_id == "B")) {
		$sql_main_inventory = "SELECT * FROM main_inventory";
		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

		while ($row = mysqli_fetch_array($main_inv_results)) {
			echo "<option value=".$row['main_item_val'].">".$row['main_item_name']."</option>";
		}
	}elseif ($location_id == "C") {
		$sql_main_inventory = "SELECT * FROM physics_main_inventory";
		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

		while ($row = mysqli_fetch_array($main_inv_results)) {
		echo "<option value=".$row['main_inventory_val'].">".$row['main_inventory_name']."</option>";
		}
	}elseif ($location_id == "D") {
		$sql_main_inventory = "SELECT * FROM chemistry_main_inventory";
		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

		while ($row = mysqli_fetch_array($main_inv_results)) {
		echo "<option value=".$row['main_inventory_val'].">".$row['main_inventory_name']."</option>";
		}
	}elseif ($location_id == "E") {
		$sql_main_inventory = "SELECT * FROM bio_main_inventory";
		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

		while ($row = mysqli_fetch_array($main_inv_results)) {
		echo "<option value=".$row['main_inventory_val'].">".$row['main_inventory_name']."</option>";
		}
	}
}

?>