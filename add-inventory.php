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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<title>New Inventory Addition</title>
</head>
<body>
	<section>
		<div id="add-inventory-form-div">
			<div class="form-title">
				<h1>Add New Inventory</h1>
			</div>
			<div class="form-divider"></div>
			<form>
				<div id="form-content">
					<div class="form-group main-select-list">
					    <legend>Main Inventory Category</legend>
					    <select class="form-control" id="main_inventory_categotry">
					    	<option>Select main inventory category...</option>
					    	<?php

				    		$sql_main_inventory = "SELECT * FROM main_inventory_item";
				    		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

				    		while ($row = mysqli_fetch_array($main_inv_results)) {
				    			echo "<option value=".$row['main_inventory_val'].">".$row['main_inventory_item']."</option>";
				    		}

				    		?>
					    </select>
					</div>
					<div class="form-group">
					    <legend>Sub Inventory Name</legend>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter sub inventory name here...">
					</div>
					<div class="form-divider-bottom"></div>
					<div id="add-inventory-button-div">
						<button type="submit" name="add" class="btn btn-success">Add Inventory<i class="fab fa-telegram-plane"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div id="back-to-home-button">
			<a class="btn btn-danger" href="home.php">Back to Home</a>
		</div>
	</section>
</body>
</html>