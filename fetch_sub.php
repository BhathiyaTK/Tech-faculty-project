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

	if ($list_id == "1") {
		$sql = "SELECT * FROM chair";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['chair_val'].">".$row['chair_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "2") {
		$sql = "SELECT * FROM tables";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['tables_val'].">".$row['tables_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "3") {
		$sql = "SELECT * FROM drawer_cupboard_steel";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['dcupboard_val'].">".$row['dcupboard_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "4") {
		$sql = "SELECT * FROM wood_book_rack";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['wbook_rack_val'].">".$row['wbook_rack_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "5") {
		$sql = "SELECT * FROM computer";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['computer_val'].">".$row['computer_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "6") {
		$sql = "SELECT * FROM steel_cupboard";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['scupboard_val'].">".$row['scupboard_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "7") {
		$sql = "SELECT * FROM photocopy_machine";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['pmachine_val'].">".$row['pmachine_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "8") {
		$sql = "SELECT * FROM projector_screen";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['pscreen_val'].">".$row['pscreen_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "9") {
		$sql = "SELECT * FROM network_cable";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['ncable_val'].">".$row['ncable_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}elseif ($list_id == "10") {
		$sql = "SELECT * FROM fan";
		$sql_results = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($sql_results)) {
			echo "<option value=".$row['fan_val'].">".$row['fan_name']."</option>";
		}
		echo "<option value='N/A'>N/A</option>";
	}
}

?>