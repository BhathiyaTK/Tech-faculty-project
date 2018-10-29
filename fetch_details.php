<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style type="text/css">
	.table td, .table th {
	   text-align: center;  
	}
	.table th{
		letter-spacing: 1px;
		font-size: 18px;
	}
	.table td{
	   font-family: Nunito;
	}
</style>
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

$location = $_POST['locationId'];
$inventory = $_POST['inventoryId'];

if ($location == "A") {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM chair";
		$sql_chair_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_chair_result)) {
			$chair_vl = $row['chair_val'];
			$chair_nm = $row['chair_name'];

			$sql_sub_total = "SELECT SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code1='$location' AND Code3=1 AND Code4=$chair_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
				//echo $chair_nm." = ".$row['sub_total']."<br>";
			
	?>
				<tr>
					<td><?php echo $chair_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
				</tr>
	<?php
			}
			
		}

		$sql_total = "SELECT SUM(Quantity) AS total FROM inventory_submission WHERE Code1='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
			?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total Chairs"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
				</tr>
			<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}

?>