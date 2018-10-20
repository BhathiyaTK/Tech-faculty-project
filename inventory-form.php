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
        $code3 = $_POST["main_inventory_items"];
        $code4 = $_POST["sub_inventory_items"];
        $item_price = $_POST["item_price"];
        $quantity = $_POST["quantity"];


        if (($item_price!="")&&($quantity!="")) {
            $query_inventory = "INSERT INTO inventory_submission(Code1, Code2, Code3, Code4, Price, Quantity) VALUES('$code1','$code2','$code3','$code4','$item_price','$quantity')";

           	#echo "<script type='text/javascript'>alert('done');</script>";
            if ($conn->query($query_inventory)) {
            	$message = "Inventory submitted successfully.";
				echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
            	$message = "Submission Failed! Please check the internet connection & Try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }else{
        	$message = "Please fill all fields & Try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
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
				        	<option value="A">(A) Old Building</option>
				        	<option value="B">(B) New Building</option>
				        	<option value="C">(C) Physics Lab</option>
				        	<option value="D">(D) Chemistry Lab</option>
				        	<option value="E">(E) Bio Lab</option>
				      	</select>
				      	<!--input type="hidden" name="main_location_name" id="main_location_hidden">
				      	<script type="text/javascript">
				      		$(document).ready(function() {
							    $("#main_location").change(function(){
							      	$("#main_location_hidden").val(("#main_location").find(":selected").text());
							    });
							});
				      	</script-->	
				    </div>
				    <div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
					    <legend for="inputState">Sub Location</legend>
				      	<select id="sub_locations" class="form-control" name="sub_locations">
				      		<option value="" selected>Choose...</option>
				        	<option value="A.1">(A.1) Department of Engineering Technology</option>
				        	<option value="A.2">(A.2) Mr. Nalin's Room</option>
				        	<option value="A.3">(A.3) Mr. Koswaththa's Room</option>
				        	<option value="A.4">(A.4) Dasith's Room</option>
				        	<option value="A.5">(A.5) Miss. Pabasara's Room</option>
				        	<option value="A.6">(A.6) Mechanical Lecture's Room</option>
				        	<option value="A.7">(A.7) Electrical Lecture's Room</option>
				        	<option value="A.8">(A.8) Computer Lecture's Room</option>
				        	<option value="A.9">(A.9) Computer Lab</option>
				        	<option value="A.10">(A.10) Dining Room</option>
				        	<option value="A.11">(A.11) P.I.U(Project Implementation Unit</option>
				        	<option value="A.12">(A.12) Corridors</option>
				        	<option value="B.1">(B.1) Office of Dean</option>
				        	<option value="B.2">(B.2) Sarath Room</option>
				        	<option value="B.3">(B.3) Department of Bio System</option>
				        	<option value="B.4">(B.4) Dean's Room</option>
				        	<option value="B.5">(B.5) Sadun Office</option>
				        	<option value="B.6">(B.6) Acedamic Registar Room</option>
				        	<option value="B.7">(B.7) Corridor</option>
				        	<option value="C.1">(C.1) Physics Lab</option>
				        	<option value="D.1">(D.1) Chemistry Lab</option>
				        	<option value="E.1">(E.1) Bio Lab</option>
				      	</select>
				      	<!--input type="hidden" name="sub_location_name" id="sub_location_hidden">
				      	<script type="text/javascript">
				      		$(document).ready(function() {
							    $("#sub_locations").change(function(){
							      	$("#sub_location_hidden").val(("#sub_locations").find(":selected").text());
							    });
							});
				      	</script-->
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row">
					    <legend for="inputState">Main Inventory Item</legend>
				      	<select id="main_inventory_items" class="form-control" name="main_inventory_items">
				      		<option value="" selected>Choose...</option>
				        	<option value="CH">Chair </option>
				        	<option value="TA">Table </option>
				        	<option value="DCS">Drawer Cupboard Steel </option>
				        	<option value="BR">Book Rack </option>
				        	<option value="CO">Computer </option>
				        	<option value="SC">Steel Cupboard </option>
				        	<option value="PM">Photocopy Machines </option>
				        	<option value="PS">Project & Screen </option>
				        	<option value="NC">Network Cable </option>
				        	<option value="FA">Fan</option>
				      	</select>
					</div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 sub-form-row-left">
				      	<legend for="inputState">Sub Inventory Item</legend>
				      	<select id="sub_inventory_items" class="form-control" name="sub_inventory_items">
				      		<option value="" selected>Choose...</option>
				        	<option value="CH.1">Small Rotation Chair</option>
				        	<option value="CH.2">Main Chair(Room's)</option>
				        	<option value="CH.3">Visitor Chair</option>
				        	<option value="CH.4">Dining Table Chair</option>
				        	<option value="CH.5">Four Set Chair</option>
				        	<option value="CH.6">Lobby Chair</option>
				        	<option value="TA.1">Computer Table</option>
				        	<option value="TA.2">Wood Table big</option>
				        	<option value="TA.3">Wood Table small</option>
				        	<option value="TA.4">Steel Table</option>
				        	<option value="TA.5">Board Room Table</option>
				        	<option value="DCS.1">N/A</option>
				        	<option value="BR.1">Big</option>
				        	<option value="BR.2">Small</option>
				        	<option value="CO.1">N/A</option>
				        	<option value="SC.1">N/A</option>
				        	<option value="PM.1">N/A</option>
				        	<option value="PS.1">N/A</option>
				        	<option value="NC.1">N/A</option>
				        	<option value="FA.1">Ceeling Fan</option>
				        	<option value="FA.2">Wall Fan</option>
				        	<option value="FA.3">Stand Fan</option>
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