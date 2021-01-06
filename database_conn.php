<?php
	$mysqli = new mysqli("localhost","root","Admin@1234","incept_test_db");

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
?> 