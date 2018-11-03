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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["add_main"])) {
		
		$main_location = $_POST['main_location'];
		$main_request = $_POST["new_main_inventory"];

		if ($main_request != "") {

			$sql_main = "SELECT * FROM main_inventory";
			$sql_main_result = mysqli_query($conn,$sql_main);////////
			$sql_phy6 = "SELECT * FROM physics_lab_inventory";
			$sql_phy6_result = mysqli_query($conn,$sql_phy6);////////
			$sql_chem = "SELECT * FROM chemistry_lab_inventory";
			$sql_chem_result = mysqli_query($conn,$sql_chem);////////
			$sql_bio = "SELECT * FROM bio_lab_inventory";
			$sql_bio_result = mysqli_query($conn,$sql_bio);/////////

			if (($main_location == "A") || ($main_location == "B")) {
				$sqlm = "SELECT MAX(main_item_val) AS main_max_val FROM main_inventory";
				$sqlm_result = mysqli_query($conn,$sqlm);
				foreach ($sql_result as $row) {
					$main_max = $row['main_max_val'];
					$up_main_max = ++$main_max;

					$add_main_inventory = "INSERT INTO main_inventory(main_item_val,main_item_name) VALUES('$up_main_max','$main_request')";
					if ($conn->query($add_inventory)) {
	            		$message = "Main inventory added successfully.";
	            		echo "<script type='text/javascript'>alert('$message');</script>";
		            }else{
		            	$message = "Process Failed! Please check the internet connection & Try again.";
						echo "<script type='text/javascript'>alert('$message');</script>";
		            }
				}
			}elseif ($main_location == "C") {
				$sqlm = "SELECT MAX(main_inventory_val) AS main_max_val FROM physics_main_inventory";
				$sqlm_result = mysqli_query($conn,$sqlm);
				foreach ($sql_result as $row) {
					$main_max = $row['main_max_val'];
					$up_main_max = ++$main_max;

					$add_main_inventory = "INSERT INTO physics_main_inventory(main_inventory_val,main_inventory_name) VALUES('$up_main_max','$main_request')";
					if ($conn->query($add_inventory)) {
	            		$message = "Main inventory added successfully.";
	            		echo "<script type='text/javascript'>alert('$message');</script>";
		            }else{
		            	$message = "Process Failed! Please check the internet connection & Try again.";
						echo "<script type='text/javascript'>alert('$message');</script>";
		            }
				}
			}elseif ($main_location == "D") {
				$sqlm = "SELECT MAX(main_inventory_val) AS main_max_val FROM chemistry_main_inventory";
				$sqlm_result = mysqli_query($conn,$sqlm);
				foreach ($sql_result as $row) {
					$main_max = $row['main_max_val'];
					$up_main_max = ++$main_max;

					$add_main_inventory = "INSERT INTO chemistry_main_inventory(main_inventory_val,main_inventory_name) VALUES('$up_main_max','$main_request')";
					if ($conn->query($add_inventory)) {
	            		$message = "Main inventory added successfully.";
	            		echo "<script type='text/javascript'>alert('$message');</script>";
		            }else{
		            	$message = "Process Failed! Please check the internet connection & Try again.";
						echo "<script type='text/javascript'>alert('$message');</script>";
		            }
				}
			}elseif ($main_location == "E") {
				$sqlm = "SELECT MAX(main_inventory_val) AS main_max_val FROM bio_main_inventory";
				$sqlm_result = mysqli_query($conn,$sqlm);
				foreach ($sql_result as $row) {
					$main_max = $row['main_max_val'];
					$up_main_max = ++$main_max;

					$add_main_inventory = "INSERT INTO bio_main_inventory(main_inventory_val,main_inventory_name) VALUES('$up_main_max','$main_request')";
					if ($conn->query($add_inventory)) {
	            		$message = "Main inventory added successfully.";
	            		echo "<script type='text/javascript'>alert('$message');</script>";
		            }else{
		            	$message = "Process Failed! Please check the internet connection & Try again.";
						echo "<script type='text/javascript'>alert('$message');</script>";
		            }
				}
			}
		}
	}
	///////////////////////////////
	if (isset($_POST["add_sub"])) {
		
		$main_inventory = $_POST["main_inventory"];
		$sub_request = $_POST["new_sub_inventory"];

		if ($sub_request != "") {

			$sql = "SELECT MAX(sub_val) AS max_val FROM sub_inventory WHERE sub_main_val=$main_inventory";
			$sql_result = mysqli_query($conn,$sql);
			//while($row = mysqli_fetch_array($sql_result))
			foreach ($sql_result as $row) {
				$max = $row['max_val'];
				$up_max = ++$max;

				$add_inventory = "INSERT INTO sub_inventory(sub_main_val,sub_val,sub_name) VALUES('$main_inventory','$up_max','$sub_request')";
				if ($conn->query($add_inventory)) {
            		$message = "Sub inventory added successfully.";
            		echo "<script type='text/javascript'>alert('$message');</script>";
	            }else{
	            	$message = "Process Failed! Please check the internet connection & Try again.";
					echo "<script type='text/javascript'>alert('$message');</script>";
	            }
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="add-inventory-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script type="text/javascript" src="inventory-form-functions.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<title>New Inventory Addition</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#new_inventory_form").validate({
	        	rules: {
	        		main_inventory: "required",
	        		new_inventory: "required"
	        	},
	    		messages: {
	    			main_inventory: "Please select main inventory category",
			      	new_inventory: "Please enter new inventory's name"
			    },

			    submitHandler: function(form) {
			      	form.submit();
			    }
	        });
		});
	</script>
</head>
<body>
	<section>
		<div id="add-inventory-form-div">
			<div class="form-title">
				<h1>Add New Inventory</h1>
			</div>
			<div class="form-divider"></div>
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div id="form-content">
						<form id="new_inventory_form" action="add-inventory.php" method="POST">
							<div class="head_msg">
								<div class="row">
									<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
										<i class="fas fa-exclamation-circle warning-msg"></i>
									</div>
									<div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
										<p>If <span>main inventory</span> is not exist, add main inventory from below form.</p>
									</div>
								</div>
							</div>
							<div class="form-group main-select-list">
							    <legend>Location</legend>
							    <select class="form-control" id="main_location_select" name="main_location">
							    	<option value="">Select the location...</option>
							    	<?php
							    		$sql_main_location = "SELECT * FROM main_locations";
							    		$main_loc_results = mysqli_query($conn,$sql_main_location);

							    		while ($row = mysqli_fetch_array($main_loc_results)) {
							    			echo "<option value=".$row['main_val'].">".$row['main_location']."</option>";
							    		}
						    		?>
							    </select>
							</div>
							<div class="form-group">
							    <legend>Main Inventory Name</legend>
							    <input type="text" name="new_main_inventory" class="form-control" id="formGroupExampleInput" placeholder="Enter main inventory name here...">
							</div>
							<div class="form-divider-bottom"></div>
							<div id="add-inventory-button-div">
								<button type="submit" name="add_main" class="btn btn-success">Add main item<i class="fab fa-telegram-plane"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div id="form-content">
						<form id="new_inventory_form" action="add-inventory.php" method="POST">
							<div class="head_msg">
								<div class="row">
									<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">
										<i class="fas fa-exclamation-circle warning-msg"></i>
									</div>
									<div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
										<p>If only <span>sub inventory</span> has to add, add sub inventory from below form.</p>
									</div>
								</div>
							</div>
							<div class="head_msg">
								
							</div>
							<div class="form-group main-select-list">
							    <legend>Main Inventory Category</legend>
							    <select class="form-control" id="main_inventory_category" name="main_inventory">
							    	<option value="">Select main inventory category...</option>
							    	<?php
							    		$sql_main_inventory = "SELECT * FROM main_inventory";
							    		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

							    		while ($row = mysqli_fetch_array($main_inv_results)) {
							    			echo "<option value=".$row['main_item_val'].">".$row['main_item_name']."</option>";
							    		}
						    		?>
							    </select>
							</div>
							<div class="form-group">
							    <legend>Sub Inventory Name</legend>
							    <input type="text" name="new_sub_inventory" class="form-control" id="formGroupExampleInput" placeholder="Enter sub inventory name here...">
							</div>
							<div class="form-divider-bottom"></div>
							<div id="add-inventory-button-div">
								<button type="submit" name="add_sub" class="btn btn-success">Add sub item<i class="fab fa-telegram-plane"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
		<div id="back-to-home-button">
			<a class="btn btn-danger" href="home.php">Back to Home</a>
		</div>
	</section>
</body>
</html>