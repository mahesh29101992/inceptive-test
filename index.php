<?php
	require_once('database_conn.php');

	$sql = "SELECT * FROM states";
	$states = mysqli_query($mysqli,$sql);
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
	<section class="register">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 col-3">
				</div>	
			    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 col-6">
					<form id="register-form" action="home-page.php" method="post" name="register-form">
					    <div class="row">
					      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12 text-center">
					      	<h3>Register</h3>
					      </div>
					    </div>
					    <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="first_name">First Name: </label>
		                    		<input type="text" id="first_name" name="first_name" class="form-control" maxlength="30">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="last_name">Last Name: </label>
		                    		<input type="text" id="last_name" name="last_name" class="form-control" maxlength="30">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="email_address">Email Address: </label>
		                    		<input type="email" id="email_address" name="email_address" class="form-control" maxlength="50">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="mobile_no">Mobile No: </label>
		                    		<input type="tel" id="mobile_no" name="mobile_no" class="form-control" maxlength="10">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="state">State: </label>
		                    		<select id="state" name="state" class="form-control">
		                    			<option value="">---Select State---</option>
		                    			<?php
		                    				while($row = mysqli_fetch_assoc($states)) {
		                    			?>
		                    				<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
		                    			<?php } ?>
		                    		</select>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="city">City: </label>
		                    		<select id="city" name="city" class="form-control">
		                    			<option value="">---Select City---</option>
		                    		</select>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="pass">Password: </label>
		                    		<input type="password" id="pass" name="pass" class="form-control">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12">
								<div class="form-group">
		                    		<label for="cnf_pass">Comfirm Password: </label>
		                    		<input type="password" id="cnf_pass" name="cnf_pass" class="form-control">
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
					      	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-12 text-center">
								<div class="form-group">
		                    		<input type="submit" id="sub-btn" class="btn btn-primary" value="Register">
		                    	</div>
		                    </div>
		                </div>	
					</form>
				</div>
				<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 col-3">
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
      	$('#state').on('change', function() {
	        var state_id = $(this).val();
	        if(state_id) {
	          $.ajax({
	            type: 'POST',
	            url: 'ajaxCityData.php',
	            data: 'state_id=' + state_id,
	            success: function(html) {
	              $('#city').html(html);
	            }
	          });
	        }
	      });

      	$("form[name='register-form']").validate({
		    rules: {
		      first_name: "required",
		      last_name: "required",
		      email_address: {
		        required: true,
		        email: true
		      },
		      mobile_no:{
		      	required: true,
		        maxlength:10,
		        minlength:10
		      },
		      state: "required",
		      city: "required",
		      pass: {
		        required: true
		      },
		      cnf_pass: {
		        required:true,
                equalTo:"#pass"
		      }
		    },
		    // Specify validation error messages
		    messages: {
		      first_name: "Please enter your firstname",
		      last_name: "Please enter your lastname",
		      email_address: {
		        required: "Please enter a valid email address"
		      },
		      mobile_no:{
		      	required: "Please enter a mobile number",
		        maxlength:"Please enter valid mobile number",
		        minlength:"Please enter valid mobile number"
		      },
		      state: "Please select a state",
		      city: "Please select a city",
		      pass: {
		        required: "Please enter password"
		      },
		      cnf_pass: {
		        required:"Please confirm password.",
                equalTo:"Passwords do not match. Please try again."
		      }
		    },
		    // Make sure the form is submitted to the destination defined
		    // in the "action" attribute of the form when valid
		    submitHandler: function(form) {
		      form.submit();
		    }
		  });
      });
    </script>
</body>
</html>