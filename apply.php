<?php
require 'connect.php';
require 'layout.php';


if(isset($_POST['grant_type']) && isset($_POST['amount']) && isset($_POST['description']) && isset($_POST['inst_id']))
{
	require 'classgrants.php';
	$grants = new grants;
	$grants->userid = $_SESSION['userid'];
	$grants->grant_type = $_POST['grant_type'];
	$grants->amount = $_POST['amount'];
	$grants->description = $_POST['description'];
	$grants->inst_id = $_POST['inst_id'];
	$grants->Verify();

}

?>



<html>
<head>
	<title>Apply</title>
</head>
<body>
	
	<form class="col s12" method="post" action="" enctype="multipart/form-data">
		<div class="container col s12">
			<div class="row">
				<!-- <div class="input-field col s1 offset-s3">
					<label style="font-size:1.1em; color:black;">Type:</label>
				</div> -->
				<div class="input-field col s5 offset-s3" >
				    <select name="grant_type" id="grant_type" required>
				    	<option value="" disabled selected>Select Type of Grant</option>
				    	<option value="Travel">Travel</option>
				    	<option value="Medical">Medical</option>
				    	<option value="Others">Others</option>
				    </select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s5 offset-s3">
					<input type="number" name="amount" id="amount" min="0" max="10000" class="validate" required >
					<label for="amount">Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s5 offset-s3">
					<textarea id="description" name="description" class="materialize-textarea" required></textarea>
	          		<label for="description">Details</label>
	          	</div>
			</div>
			<div class="row" id="bill_div" >
				<div class="col s5 offset-s3">
					<span>Upload your Bill :</span>
					<input type="file" name="imageUpload" id="imageUpload" required>
				</div>
	   		</div>
	   		<div class="row">
        		<div class="input-field col s5 offset-s3">
	          		<select name="inst_id" required>
	          			<?php
	   						$query="SELECT `userid` FROM `users` WHERE `role`='1'";
	   			
	   						if($query_run=mysql_query($query))
	   						{
	   							while($rows=mysql_fetch_assoc($query_run))
	   							{
	   								echo '<option value="'.$rows['userid'].'">'.$rows['userid'].'</option>';
	   							}
	   						}
	   						else
	   							echo mysql_error();
   						?>
	          			
	         		</select>
          			<label for="role">Instructor</label>
        		</div>
       			<script type="text/javascript">
        			$(document).ready(function() {
			    	$('select').material_select();
					});
        		</script>
   			</div>
   			<div class="row">
        		<div class="input-field col s5 offset-s3">
          			<button class="btn waves-effect waves-light" type="submit" name="action">Apply
          			<i class="material-icons right">play_circle_filled</i>
          			</button>
       			</div>
     		</div>
    	</div>/
	</form>

</body>
</html>