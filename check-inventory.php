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
	<link rel="stylesheet" type="text/css" href="check-inventory-style.css">
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
	<title>Check Inventory</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#check_inventory').click(function(){
				var check_id = $("#check_inventory").val();
				var location_id = $("#location").val();
				var inventory_id = $("#inventory").val();
				$.post(
					"fetch_details.php",
					{
						checkId:check_id, 
						locationId:location_id, 
						inventoryId:inventory_id
					},
					function(data)
					{
						$('#details_content').html(data);
					}
				);
			});
			$("#check_form").validate({
	        	rules: {
	        		location: "required",
	        		inventory: "required"
	        	},
	    		messages: {
	    			location: "Please select the location",
			      	inventory: "Please select inventory"
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
		<div id="check-form-div">
			<div id="form-title">
				<h1>Check Inventory Details</h1>
			</div>
			<div class="form-divider"></div>
			<div id="check-form-content">
				<form id="check_form">
					<div class="form-row">
					    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
					    	<legend>Location</legend>
					    	<select id="location" class="form-control" name="location">
					    		<option value="">Choose...</option>
					    		<option value="A">Old Building</option>
					    		<option value="B">New Building</option>
					    		<option value="A.1">Department of Engineering Technology</option>
					    		<option value="B.3">Department of Bio System</option>
					    		<option value="all">All</option>
					      	</select>	
					    </div>
					    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
						    <legend for="inputState">Inventory Type</legend>
					      	<select id="inventory" class="form-control" name="inventory">
					      		<option value="">Choose...</option>
					      		<?php

					    		$sql_main_inventory = "SELECT * FROM main_inventory_item";
					    		$main_inv_results = mysqli_query($conn,$sql_main_inventory);

					    		while ($row = mysqli_fetch_array($main_inv_results)) {
					    			echo "<option value=".$row['main_inventory_val'].">".$row['main_inventory_item']."</option>";
					    		}

					    		?>
					      	</select>
					    </div>
					</div>
					<div class="form-divider-bottom"></div>
					<div id="check-button-div">
						<button type="submit" name="check" id="check_inventory" class="btn btn-success">Check Details<i class="fas fa-search"></i></button>
					</div>
				</form>
			</div>
			<div id="details_content">
				
			</div>
		</div>
		<div id="back-to-home-button">
			<a class="btn btn-danger" href="home.php">Back to Home</a>
		</div>
	</section>
</body>
</html>