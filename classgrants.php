<?php

class grants{
	var $userid;
	var $grant_type;
	var $amount;
	var $description;
	var $inst_id;


	function Verify(){
		if(!empty($this->grant_type) && !empty($this->amount) && !empty($this->description) && !empty($this->inst_id)){
			$this->AddToDataBase();
		}
		else
			echo 'All Fields Required';
	}


	function AddToDataBase(){
		$q = "INSERT INTO grants VALUES ('','".$this->userid."',
											   '".$this->grant_type."',
											   '".$this->amount."',
											   '".$this->description."',
											   '',
											   '".$this->inst_id."',
											   '".date('Y/m/d h:i:s')."',
											   '','','')";

			if($q_run = mysql_query($q))
			{
				echo "<br><div class='row'>
			      	<div class='col s6 offset-s3' style='color:green;'>
			      		Successfully Applied.
			      	</div>
			      </div>";
				$query="SELECT id FROM grants ORDER BY id DESC LIMIT 1";
				$query_run=mysql_query($query);
				$recent_id=mysql_result($query_run, 0, 'id');
				//echo $recent_id;
				$target_dir = "uploads/";
   				$target_file = $target_dir . $recent_id.'.jpg';
   				move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);
			}
			else
			{
				echo "Error : ".mysql_error();
			}
	}


}
?>