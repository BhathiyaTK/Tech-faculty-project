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
	.table #td_price{
		text-align: left;
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

if (($location == "A") || ($location == "B")) {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM sub_inventory WHERE sub_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['sub_val'];
			$item_nm = $row['sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code1='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}elseif ($location == "C") {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM physics_lab_inventory WHERE physics_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['physics_sub_val'];
			$item_nm = $row['physics_sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code1='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}elseif ($location == "D") {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM chemistry_lab_inventory WHERE chem_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['chem_sub_val'];
			$item_nm = $row['chem_sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code1='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}elseif ($location == "E") {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM bio_lab_inventory WHERE bio_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['bio_sub_val'];
			$item_nm = $row['bio_sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code1='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code1='$location' AND Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}elseif (($location == "A.1") || ($location == "B.3")) {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM sub_inventory WHERE sub_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['sub_val'];
			$item_nm = $row['sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code2='$location' AND Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code2='$location' AND Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code2='$location' AND Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}elseif ($location == "all") {
	if ($inventory == "$inventory") {
		$sql_item = "SELECT * FROM sub_inventory WHERE sub_main_val=$inventory";
		$sql_item_result = mysqli_query($conn,$sql_item);
	?>
		<table class="table table-striped table-dark table-bordered table-sm center">
			<thead>
				<tr class="bg-primary">
					<th scope="col">Inventory Name</th>
					<th scope="col">Inventory Quantity</th>
					<th scope="col">Inventory Price</th>
				</tr>
			</thead>
			<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql_item_result)) {
			$item_vl = $row['sub_val'];
			$item_nm = $row['sub_name'];

			$sql_sub_total = "SELECT Price, SUM(Quantity) AS sub_total FROM inventory_submission WHERE Code3=$inventory AND Code4=$item_vl";
			$sql_sub_total_result = mysqli_query($conn,$sql_sub_total);
			while ($row = mysqli_fetch_array($sql_sub_total_result)) {
	?>
				<tr>
					<td><?php echo $item_nm; ?></td>
					<td><?php echo $row['sub_total']; ?></td>
					<td id="td_price"><?php echo "(Rs.".$row['Price']."/- X ".$row['sub_total'].") = Rs.".$row['Price']*$row['sub_total']."/-"; ?></td>
				</tr>
	<?php
			}
		}

		$sql_total = "SELECT Price, Quantity, SUM(Quantity) AS total FROM inventory_submission WHERE Code3='$inventory'";
		$sql_result = mysqli_query($conn,$sql_total);
		while ($row = mysqli_fetch_array($sql_result)) {
			//echo "Total Chairs = ".$row['total'];
	?>
				<tr class="bg-danger">
					<th scope="col"><?php echo "Total"; ?></th>
					<th scope="col"><?php echo $row['total']; ?></th>
					<?php  
						$value = "SELECT SUM(Price*Quantity) AS total_price FROM inventory_submission WHERE Code3=$inventory";
						$val_result = mysqli_query($conn,$value);
						foreach ($val_result as $row) {
					?>
					<th scope="col"><?php echo "Rs.".$row['total_price']."/-"; ?></th>
					<?php
						}
					?>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
	}
}else{
	echo "<script>alert('Please select the location & inventory!');</script>";
}
?>