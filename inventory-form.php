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
	<link rel="stylesheet" type="text/css" href="inventory-form-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script type="text/javascript" src="inventory-form-functions.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
				      		<option value="" selected>Choose...</option>
				        	<option value="old_building">(A) Old Building</option>
				        	<option value="new_building">(B) New Building</option>
				        	<option value="physics">(C) Physics Lab</option>
				        	<option value="chemistry">(D) Chemistry Lab</option>
				        	<option value="bio">(E) Bio Lab</option>
				      	</select>	
				    </div>
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
					    <legend for="inputState">Sub Location</legend>
				      	<select id="sub_locations" class="form-control" name="sub_locations">
				      		<option value="" selected>Choose...</option>
				        	<option value="old_building 1">(A.1) Department of Engineering Technology</option>
				        	<option value="OL-old_building 2">(A.2) Mr. Nalin's Room</option>
				        	<option value="OL-old_building 3">(A.3) Mr. Koswaththa's Room</option>
				        	<option value="OL-old_building 4">(A.4) Dasith's Room</option>
				        	<option value="OL-old_building 5">(A.5) Miss. Pabasara's Room</option>
				        	<option value="OL-old_building 6">(A.6) Mechanical Lecture's Room</option>
				        	<option value="OL-old_building 7">(A.7) Electrical Lecture's Room</option>
				        	<option value="OL-old_building 8">(A.8) Computer Lecture's Room</option>
				        	<option value="OL-old_building 9">(A.9) Computer Lab</option>
				        	<option value="OL-old_building 10">(A.10) Dining Room</option>
				        	<option value="OL-old_building 11">(A.11) P.I.U(Project Implementation Unit</option>
				        	<option value="OL-old_building 12">(A.12) Corridors</option>
				        	<option value="NE-new_building 1">(B.1) Office of Dean</option>
				        	<option value="NE-new_building 2">(B.2) Sarath Room</option>
				        	<option value="NE-new_building 3">(B.3) Department of Bio System</option>
				        	<option value="NE-new_building 4">(B.4) Dean's Room</option>
				        	<option value="NE-new_building 5">(B.5) Sadun Office</option>
				        	<option value="NE-new_building 6">(B.6) Acedamic Registar Room</option>
				        	<option value="NE-new_building 7">(B.7) Corridor</option>
				        	<option value="PH-physics 1">(C.1) Physics Lab</option>
				        	<option value="CH-chemistry 1">(D.1) Chemistry Lab</option>
				        	<option value="BI-bio 1">(E.1) Bio Lab</option>
				      	</select>
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
					    <legend for="inputState">Main Inventory Item</legend>
				      	<select id="main_inventory_items" class="form-control" name="main_inventory_items">
				      		<option value="" selected>Choose...</option>
				        	<option value="chair">(A.1.1) Chair </option>
				        	<option value="table">(A.1.2)Table </option>
				        	<option value="drawer_cupborad_steel">(A.1.3) Drawer Cupboard Steel </option>
				        	<option value="book_rack">(A.1.4) Book Rack </option>
				        	<option value="computer">(A.1.5) Computer </option>
				        	<option value="steel_cupboard">(A.1.6) Steel Cupboard </option>
				        	<option value="photocopy_machine">(A.1.7) Photocopy Machines </option>
				        	<option value="project_sreen">(A.1.8) Project & Screen </option>
				        	<option value="network_cable">(A.1.9) Network Cable </option>
				        	<option value="fan">(A.1.10) Fan</option>
				      	</select>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
				      	<legend for="inputState">Sub Inventory Item</legend>
				      	<select id="sub_inventory_items" class="form-control" name="sub_inventory_items">
				      		<option value="" selected>Choose...</option>
				        	<option value="CH-chair 1">(A.1.1.1) Small Rotation Chair</option>
				        	<option value="CH-chair 2">(A.1.1.2) Main Chair(Room's)</option>
				        	<option value="CH-chair 3">(A.1.1.3) Visitor Chair</option>
				        	<option value="CH-chair 4">(A.1.1.4) Dining Table Chair</option>
				        	<option value="CH-chair 5">(A.1.1.5) Four Set Chair</option>
				        	<option value="CH-chair 6">(A.1.1.6) Lobby Chair</option>
				        	<option value="TA-table 1">(A.1.2.1) Computer Table</option>
				        	<option value="TA-table 2">(A.1.2.2) Wood Table big</option>
				        	<option value="TA-table 3">(A.1.2.3) Wood Table small</option>
				        	<option value="TA-table 4">(A.1.2.4) Steel Table</option>
				        	<option value="TA-table 5">(A.1.2.5) Board Room Table</option>
				        	<option value="DR-drawer_cupborad_steel 1">N/A</option>
				        	<option value="BO-book_rack 1">(A.1.4.1) Big</option>
				        	<option value="BO-book_rack 2">(A.1.4.2) Small</option>
				        	<option value="CO-computer 1">N/A</option>
				        	<option value="ST-steel_cupboard 1">N/A</option>
				        	<option value="PH-photocopy_machine 1">N/A</option>
				        	<option value="PR-project_sreen 1">N/A</option>
				        	<option value="NE-network_cable 1">N/A</option>
				        	<option value="FA-fan 1">(A.1.10.1) Ceeling Fan</option>
				        	<option value="FA-fan 2">(A.1.10.2) Wall Fan</option>
				        	<option value="FA-fan 3">(A.1.10.3) Stand Fan</option>
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
					<button type="submit" class="btn btn-success">Submit Inventory Data</button>
				</div>
			</form>
		</div>
		<div id="back-to-home-button">
			<a class="btn btn-danger" href="home.php">Back to Home</a>
		</div>
	</section>

	<script type="text/javascript">

		$(document).ready(function(){
			$("#inventory_form").validate({
            	rules: {
            		main_location: "required",
            		sub_locations: "required",
            		main_inventory_items: "required",
            		sub_inventory_items: "required",
            		quantity: "required"
            	},
        		messages: {
        			main_location: "Please select main lacation",
			      	sub_locations: "Please select sub location",
			      	main_inventory_items: "Please select main inventory item",
			      	sub_inventory_items: "Please select sub inventory item",
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
		        options0 = select0.find('option'),
		        select1 = $('#main_inventory_items'),
		        options1 = select1.find('option'),
		        select2 = $('#sub_inventory_items'),
		        options2 = select2.find('option');
		    
		    $(options).click(function(){
		        var visibleItems = options0.filter('[value*="' + $(this).val()  + '"]').show();
		        options0.not(visibleItems).hide();
		        
		        if(visibleItems.length > 0)
		        {
		            select0.val(visibleItems.eq(0).val());
		        }
		    });
		    $(options1).click(function(){
		    	var visibleItems1 = options2.filter('[value*="' + $(this).val() + '"]').show();
		    	options2.not(visibleItems1).hide();

		    	if (visibleItems1.length > 0) 
		    	{
		    		select2.val(visibleItems1.eq(0).val());
		    	}
		    });
		});
	</script>
</body>
</html>