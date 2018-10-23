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

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["submit"])) {

    	$code1 = $_POST["main_location"];
        $code2 = $_POST["sub_locations"];
        $code3 = $_POST["sub_locations"].".".$_POST["main_inventory_items"];
        $code4 = $_POST["sub_locations"].".".$_POST["main_inventory_items"].".".$_POST["sub_inventory_items"];
        $item_price = $_POST["item_price"];
        $quantity = $_POST["quantity"];


        if (($item_price!="")&&($quantity!="")) {
            $query_inventory = "INSERT INTO inventory_submission(Code1,Code2,Code3,Code4,Price,Quantity) VALUES('$code1','$code2','$code3','$code4','$item_price','$quantity')";

           	#echo "<script type='text/javascript'>alert('done');</script>";
            if ($conn->query($query_inventory)) {
            	$message = "Inventory submitted successfully.";
            }else{
            	$message = "Submission Failed! Please check the internet connection & Try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
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
	<link rel="stylesheet" type="text/css" href="inventory-form-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script type="text/javascript" src="inventory-form-functions.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<title>Inventory Submission</title>
</head>
<body>
	<section>
		<div id="form-section">
			<div class="form-title">
				<h1>Inventory Data Submission</h1>
			</div>
			<div class="form-divider"></div>
			<form action="inventory-form.php" method="POST" id="inventory_form">
				<div class="form-row">
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
				    	<legend>Main Location</legend>
				    	<select id="main_location" class="form-control" name="main_location">
				    		<option value="">Choose...</option>
				    		<?php

				    		$sql_main_loations = "SELECT * FROM main_locations";
				    		$main_loc_results = mysqli_query($conn,$sql_main_loations);

				    		while ($row = mysqli_fetch_array($main_loc_results)) {
				    			echo "<option value=".$row['main_val'].">".$row['main_location']."</option>";
				    		}

				    		?>
				      	</select>	
				    </div>
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
					    <legend for="inputState">Sub Location</legend>
				      	<select id="sub_locations" class="form-control" name="sub_locations">
				      		<option value="">Choose...</option>
				      		<?php

				    		$sql_sub_loations = "SELECT * FROM sub_locations";
				    		$sub_loc_results = mysqli_query($conn,$sql_sub_loations);

				    		while ($row = mysqli_fetch_array($sub_loc_results)) {
				    			echo "<option value=".$row['sub_val'].">".$row['sub_location']."</option>";
				    		}

				    		?>
				      	</select>
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
					    <legend for="inputState">Main Inventory Item</legend>
				      	<select id="main_inventory_items" class="form-control" name="main_inventory_items">
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
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
				      	<legend for="inputState">Sub Inventory Item</legend>
				      	<select id="sub_inventory_items" class="form-control" name="sub_inventory_items">
				      		<option value="">Choose...</option>
				      		<option value="N/A">N/A</option>
				      		<?php

				      			$sql_chair = "SELECT * FROM chair";
				      			$sql_tables = "SELECT * FROM tables";
				      			$sql_dc_steel = "SELECT * FROM drawer_cupboard_steel";
				      			$sql_wbook_rack = "SELECT * FROM wood_book_rack";
				      			$sql_computer = "SELECT * FROM computer";
				      			$sql_steel_cupboard = "SELECT * FROM steel_cupboard";
				      			$sql_pmachine = "SELECT * FROM photocopy_machine";
				      			$sql_proscreen = "SELECT * FROM projector_screen";
				      			$sql_netcable = "SELECT * FROM network_cable";
				      			$sql_fan = "SELECT * FROM fan";

					    		$chair_results = mysqli_query($conn,$sql_chair);
					    		while ($row = mysqli_fetch_array($chair_results)) {
					    			echo "<option value=".$row['chair_val'].">".$row['chair_name']."</option>";
					    		}
					    		$tables_results = mysqli_query($conn,$sql_tables);
					    		while ($row = mysqli_fetch_array($tables_results)) {
					    			echo "<option value=".$row['tables_val'].">".$row['tables_name']."</option>";
					    		}
					    		$dc_steel_results = mysqli_query($conn,$sql_dc_steel);
					    		while ($row = mysqli_fetch_array($dc_steel_results)) {
					    			echo "<option value=".$row['dcupboard_val'].">".$row['dcupboard_name']."</option>";
					    		}
					    		$wbook_rack_results = mysqli_query($conn,$sql_wbook_rack);
					    		while ($row = mysqli_fetch_array($wbook_rack_results)) {
					    			echo "<option value=".$row['wbook_rack_val'].">".$row['wbook_rack_name']."</option>";
					    		}
					    		$computer_results = mysqli_query($conn,$sql_computer);
					    		while ($row = mysqli_fetch_array($computer_results)) {
					    			echo "<option value=".$row['computer_val'].">".$row['computer_name']."</option>";
					    		}
					    		$scupboard_results = mysqli_query($conn,$sql_steel_cupboard);
					    		while ($row = mysqli_fetch_array($scupboard_results)) {
					    			echo "<option value=".$row['scupboard_val'].">".$row['scupboard_name']."</option>";
					    		}
					    		$pmachine_results = mysqli_query($conn,$sql_pmachine);
					    		while ($row = mysqli_fetch_array($pmachine_results)) {
					    			echo "<option value=".$row['pmachine_val'].">".$row['pmachine_name']."</option>";
					    		}
					    		$pscreen_results = mysqli_query($conn,$sql_pscreen);
					    		while ($row = mysqli_fetch_array($pscreen_results)) {
					    			echo "<option value=".$row['pscreen_val'].">".$row['pscreen_name']."</option>";
					    		}
					    		$netcable_results = mysqli_query($conn,$sql_netcable);
					    		while ($row = mysqli_fetch_array($netcable_results)) {
					    			echo "<option value=".$row['ncable_val'].">".$row['ncable_name']."</option>";
					    		}
					    		$fan_results = mysqli_query($conn,$sql_fan);
					    		while ($row = mysqli_fetch_array($fan_results)) {
					    			echo "<option value=".$row['fan_val'].">".$row['fan_name']."</option>";
					    		}
				      			//$main_inventory = mysqli_real_escape_string($conn, $_POST['main_inventory']);
				      			
				      		?>
				      	</select>
				    </div>
				</div>
				<div class="form-row" id="quantity-form-row">
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
				      	<legend for="inputZip">Item Price</legend>
				      	<input type="text" class="form-control" id="item_price" name="item_price" placeholder="Enter price of single item..." name="quantity">
				    </div>
				    <div class="form-group col-sm-12 col-md-4 col-lg-4 sub-form-row-left">
				    	<legend for="inputZip">Quantity</legend>
				      	<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity..." >
				    </div>
				</div>
				<div class="form-divider-bottom"></div>
				<div id="submit-button-div">
					<button name="submit" id="submit-button" type="submit" class="btn btn-success">Submit Inventory Data</button>
				</div>
			</form>
		</div>
		<div id="back-to-home-button">
			<a class="btn btn-danger" href="home.php">Back to Home</a>
		</div>
	</section>

	<script type="text/javascript">

		$(document).ready(function(){
			/*function changeType(){
				var main_inventory_id = $("#main_inventory_items").val();
				$.ajax({
					url:"fetch_sub.php",
					data:{mainId:main_inventory_id},
					dataType:"text",
					success:function(data)
					{
						$('#sub_inventory_items').html(data);
					}
				});
			}*/
			$("#inventory_form").validate({
            	rules: {
            		main_location: "required",
            		sub_locations: "required",
            		main_inventory_items: "required",
            		sub_inventory_items: "required",
            		item_price: "required",
            		quantity: "required"
            	},
        		messages: {
        			main_location: "Please select main lacation",
			      	sub_locations: "Please select sub location",
			      	main_inventory_items: "Please select main inventory item",
			      	sub_inventory_items: "Please select sub inventory item",
			      	item_price: "Please enter item price",
			      	quantity: "Please enter item quantity"
			    },

			    submitHandler: function(form) {
			      	form.submit();
			    }
            });
            $("#quantity").keydown(function (e) {
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
		            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		    });
		});

		$(function(){
    
		    var select = $('#main_location'),
		    	options = select.find('option'),
		    	select0 = $('#sub_locations'),
		        options0 = select0.find('option');
		    
		    $(options).click(function(){
		        var visibleItems = options0.filter('[value*="' + $(this).val()  + '"]').show();
		        options0.not(visibleItems).hide();
		        
		        if(visibleItems.length > 0)
		        {
		            select0.val(visibleItems.eq(0).val());
		        }
		    });
		});
	</script>
</body>
</html>