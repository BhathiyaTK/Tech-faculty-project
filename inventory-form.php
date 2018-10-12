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
	<title>Inventory Submission</title>
</head>
<body>
	<section>
		<div id="form-section">
			<div class="form-title">
				<h1>Inventory Data Submission</h1>
			</div>
			<form>
				<div class="form-row">
					<legend>Main Location</legend>
				    <div class="form-group col-md-6">
				    	<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="old_building">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(A) Old Building
						  	</label>
						</div>
						<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="new_building">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(B) New Building
						  	</label>
						</div>
						<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="physics">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(C) Physics Lab
						  	</label>
						</div>
				      	<!--select id="inputState1" class="form-control">
				      		<option value="" selected>Choose...</option>
				        	<option value="old_building">(A) Old Building</option>
				        	<option value="new_building">(B) New Building</option>
				        	<option value="physics">(C) Physics Lab</option>
				        	<option value="chemistry">(D) Chemistry Lab</option>
				        	<option value="bio">(E) Bio Lab</option>
				        	<option value="all">(F) All</option>
				      	</select-->
				    </div>
				    <div class="form-group col-md-6">
				    	<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="chemistry">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(D) Chemistry Lab
						  	</label>
						</div>
						<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="bio">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(E) Bio Lab
						  	</label>
						</div>
						<div class="form-check">
						  	<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="all">
						  	<label class="form-check-label" for="exampleRadios1">
						    	(F) All
						  	</label>
						</div>
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
					    <legend for="inputState">Sub Location</legend>
				      	<select id="sub_locations" class="form-control">
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
				        	<option value="AL-all 1">(F.1) All</option>
				      	</select>
				    </div>
					<div class="form-group col-md-6">
					    <legend for="inputState">Main Inventory Item</legend>
				      	<select id="inputState" class="form-control">
				      		<option selected>Choose...</option>
				        	<option>(A.1.1) Chair </option>
				        	<option>(A.1.2) Table </option>
				        	<option>(A.1.3) Drawer Cupboard Steel </option>
				        	<option>(A.1.4) Book Rack </option>
				        	<option>(A.1.5) Computer </option>
				        	<option>(A.1.6) Steel Cupboard </option>
				        	<option>(A.1.7) Photocopy Machines </option>
				        	<option>(A.1.8) Project & Screen </option>
				        	<option>(A.1.9) Network Cable </option>
				      	</select>
					</div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<legend for="inputState">Sub Inventory Item</legend>
				      	<select id="inputState" class="form-control">
				      		<option selected>Choose...</option>
				        	<option>(A.1.1.1) Small Rotation Chair</option>
				        	<option>(A.1.1.2) Main Chair(Room's)</option>
				        	<option>(A.1.1.3) Visitor Chair</option>
				        	<option>(A.1.1.4) Dining Table Chair</option>
				        	<option>(A.1.1.5) Four Set Chair</option>
				        	<option>(A.1.1.6) Lobby Chair</option>
				        	<option>(A.1.2.1) Computer Table</option>
				        	<option>(A.1.2.2) Wood Table big</option>
				        	<option>(A.1.2.3) Wood Table small</option>
				        	<option>(A.1.2.4) Steel Table</option>
				        	<option>(A.1.2.5) Board Room Table</option>
				        	<option>(A.1.4.1) Big</option>
				        	<option>(A.1.4.2) Small</option>
				        	<option>(A.1.10.1) Ceeling Fan</option>
				        	<option>(A.1.10.2) Wall Fan</option>
				        	<option>(A.1.10.3) Stand Fan</option>
				      	</select>
				    </div>
				    <div class="form-group col-md-3">
				      	<legend for="inputZip">Quantity</legend>
				      	<input type="text" class="form-control" id="inputZip" placeholder="Enter Quantity...">
				    </div>
				</div>
				<button type="submit" class="btn btn-success">Submit Inventory Data</button>
			</form>
		</div>
	</section>

	<script type="text/javascript">
		$(function(){
    
		    var select = $('#sub_locations'),
		        options = select.find('option');
		    
		    $('[type="radio"]').click(function(){
		        var visibleItems = options.filter('[value*="' + $(this).val()  + '"]').show();
		        options.not(visibleItems).hide();
		        
		        if(visibleItems.length > 0)
		        {
		            select.val(visibleItems.eq(0).val());
		        }
		    });
		});
	</script>
</body>
</html>