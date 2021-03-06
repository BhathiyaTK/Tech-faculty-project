<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="home-page-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<title>Inventory Management System</title>
</head>
<body>
	<section>
		<div id="home-page-content">
			<div id="page-header">
				<h1>Faculty of Technology - SUSL</h1>
			</div>
			<div id="home-page-sub-content">
				<div class="home-page-title">
					<h3>Inventory Management System</h3>
				</div>
				<div class="home-page-content-divider"></div>
				<div class="home-page-details">
					<div class="row">
						<div class="button-div col-lg-4">
							<div class="home-page-buttons" id="home-page-buttons-left">
								<p>
									<img src="images/research.png">
								</p>
								<a href="check-inventory.php"><i class="fas fa-search"></i>Check</a>
								<p>
									Check inventory details
								</p>
							</div>
						</div>
						<div class="button-div col-lg-4">
							<div class="home-page-buttons" id="home-page-buttons-center">
								<p>
									<img src="images/input.png">
								</p>
								<a href="inventory-form.php"><i class="fas fa-share-square"></i>add</a>
								<p>
									Submit existing inventory
								</p>
							</div>
						</div>
						<div class="button-div col-lg-4">
							<div class="home-page-buttons" id="home-page-buttons-right">
								<p>
									<img src="images/add-file.png">
								</p>
								<a href="add-inventory.php"><i class="fas fa-plus"></i>New</a>
								<p>
									Add new inventory
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>