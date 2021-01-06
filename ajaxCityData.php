<?php
	require_once('database_conn.php');

	if(isset($_POST) && !empty($_POST)){
		$state_id = $_POST['state_id'];
		$sql = "SELECT * FROM cities WHERE state_id = ".$state_id;
		$cities = mysqli_query($mysqli,$sql);

		$html = "<option value=''>---Select City---</option>";

		while($row = mysqli_fetch_assoc($cities)) {
			$html .= "<option vlaue='".$row['id']."'>".$row['city']."</option>";
		}

		echo $html;	
	}else{
		$html = "<option value=''>City doesn't exist.</option>";
		echo $html;	
	}	
?>