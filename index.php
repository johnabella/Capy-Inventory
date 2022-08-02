<?php include './config/db/index.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>
	<link href="styles/css/bootstrap.min.css" rel="stylesheet">
	<link href="styles/css/app.css" rel="stylesheet">
	<link href="styles/css/main.css" rel="stylesheet">
	<script src="styles/js/jquery.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<?php 
			include './components/sidebar.php';
    	?>
		<div class="main">
			<?php 
				include './components/navbar.php';
				include './components/main.php';
				include './components/footer.php';
				include './components/modal.php';
			?>
		</div>
	</div>
	
	<script src="styles/js/app.js"></script>
	
	
</body>
</html>