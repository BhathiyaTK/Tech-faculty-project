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

if (isset($_POST['checkId'], $_POST['locationId'], $_POST['inventoryId'])) {
	$check_id_val = $_POST['checkId'];
	$location_id_val = $_POST['locationId'];
	$inventory_id_val = $_POST['inventoryId'];

	if (($check_id_val == "A") || ($check_id_val == "B")) {
		$total_quantity = 0;

		$sql = "SELECT * FROM inventory_submission WHERE (Code1 = '$location_id_val') AND (Code3 = '$inventory_id_val')";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			$total_quantity = $total_quantity + $row['quantity'];
		}

		if ($inventory_id_val == "1") {
			$sql1 = "SELECT * FROM chair";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['chair_name']." = ";
			}
			echo "Total Chairs = ".$total_quantity;
		}elseif ($inventory_id_val == "2") {
			$sql1 = "SELECT * FROM tables";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['tables_name']." = ";
			}
			echo "Total Tables = ".$total_quantity;
		}elseif ($inventory_id_val == "3") {
			$sql1 = "SELECT * FROM drawer_cupboard_steel";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['dcupboard_name']." = ";
			}
			echo "Total Steel Drawer Cupboard = ".$total_quantity;
		}elseif ($inventory_id_val == "4") {
			$sql1 = "SELECT * FROM wood_book_rack";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['wbook_rack_name']." = ";
			}
			echo "Total Book Racks(Wood) = ".$total_quantity;
		}elseif ($inventory_id_val == "5") {
			$sql1 = "SELECT * FROM computer";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['computer_name']." = ";
			}
			echo "Total Computers = ".$total_quantity;
		}elseif ($inventory_id_val == "6") {
			$sql1 = "SELECT * FROM steel_cupboard";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['scupboard_name']." = ";
			}
			echo "Total Steel Cupboards = ".$total_quantity;
		}elseif ($inventory_id_val == "7") {
			$sql1 = "SELECT * FROM photocopy_machine";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['pmachine_name']." = ";
			}
			echo "Total Photocopy Machines = ".$total_quantity;
		}elseif ($inventory_id_val == "8") {
			$sql1 = "SELECT * FROM projector_screen";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['pscreen_name']." = ";
			}
			echo "Total Projectors & Screens = ".$total_quantity;
		}elseif ($inventory_id_val == "9") {
			$sql1 = "SELECT * FROM network_cable";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['ncable_name']." = ";
			}
			echo "Total Network Cables = ".$total_quantity;
		}elseif ($inventory_id_val == "10") {
			$sql1 = "SELECT * FROM fan";
			$sql1_results = mysqli_query($conn,$sql1);
			while ($row = mysqli_fetch_array($sql1_results)) {
				echo $row['fan_name']." = ";
			}
			echo "Total Fans = ".$total_quantity;
		}
	}
}

?>