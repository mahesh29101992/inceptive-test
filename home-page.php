<?php
	if(isset($_POST) && !empty($_POST)){
		$username = $_POST['first_name'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
	<title>Inceptive Test</title>
</head>
<body>
	<section class="sub-banner-section" style="background-color: #696969;">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12 text-center">
	        <h1>Inceptive Test</h1>
	      </div>
	    </div>
	  </div>
	</section>
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="sidebar">
					<ul class="nav nav-sidebar">
					    <li class="active"><a href="#">About Us</a></li>
					    <li><a href="#">Contact Us</a></li>
					</ul>
				</div>
				<div class="col-sm-12 main">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 col-6">
							<h1 class="page-header">Dashboard</h1>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 col-6">
							<a href="index.php" class="btn btn-primary" style="float: right;">Logout</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 col-6">		
							<h3>Hi <?php echo $username; ?>,</h3>
							<p>You are logged in!</p>
						</div>
					</div>		
				</div>
			</div>
		</div>   
	</section>	
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
      $(document).ready(function() {
      	
      });
    </script>
</body>
</html>	