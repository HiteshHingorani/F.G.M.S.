<?php
require 'connect.php';
require 'layout.php';



?>



<html>
<head>
	<title>History</title>
</head>
<body>
	<table class="bordered">
        <thead>
          <tr>
          		<th>Sr. No.</th>	
              	<th>Type</th>
              	<th>Amount</th>
              	<th>Applied On</th>
              	<th>Midware Verified On</th>
              	<th>Admin Verified On</th>
              	<th>Details</th>
              	<th>Image</th>
              	<th>Status</th>
          </tr>
        </thead>

        <tbody>
        	<?php

        		$q = "SELECT * FROM `grants` WHERE `userid`='".$_SESSION['userid']."'";
        		if($q_run = mysql_query($q))
        		{
        			$q_num_rows = mysql_num_rows($q_run);
        			if($q_num_rows == 0)
        				echo "Nothing to show";
        			else
        			{	
        				$status = ['Pending', 
        						   'Midware Approved',
        						   'Admin Approved',
        						   'Midware Disapproved',
        						   'Admin Disapproved'
        						   ];
        				
        				$count = 0;
        				while ($row = mysql_fetch_assoc($q_run)) {
        					$count++;
						    echo '
						    	<tr>
						    		<td>'.$count.'</td>
						    		<td>'.$row['type'].'</td>
						    		<td>'.$row['amount'].'</td>
						    		<td>'.$row['applied_on'].'</td>
						    		<td>'.$row['m_verified_on'].'</td>
						    		<td>'.$row['a_verified_on'].'</td>
						    		<td><a class="waves-effect waves-light modal-trigger" href="#modal'.$row['id'].'">View</a>

  
	  									<div id="modal'.$row['id'].'" class="modal">
	   										<div class="modal-content">
		    									<h5>Details</h5>
		    									<p>'.$row['description'].'</p>
	    									</div>
	    									<div class="modal-footer">
										    	<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
										    </div>
										  
	    									
	  									</div>
	  							
						    		</td>
						    		<td><img class="materialboxed" data-caption="A picture of some deer and tons of trees" width="22" src="/FGMS/uploads/'.$row['id'].'.jpg"></td>
						    		<td>'.$status[$row['checked']].'</td>
						    	</tr>
						    ';  
						}
        			}
        		}
        		else
        			echo mysql_error();
        	?>
        </tbody>
    </table>

<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
</script>

</body>
</html>