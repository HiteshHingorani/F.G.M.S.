
<?php
class login{
  var $userid;
  var $pass;
  var $verifypass;
  var $role ;

  function GetUserDetails($userid){
    if(!empty($this->userid) && !empty($this->pass)) {
        $query="SELECT userid, role, password FROM users WHERE userid='".$userid."'";
          if($query_run=mysql_query($query)) {
            $query_num_rows=mysql_num_rows($query_run);

            if($query_num_rows==0) 
              echo "<br><div class='row'>
			      	<div class='col s6 offset-s4' style='color:red;'>
			      		Used Id does not exist.
			      	</div>
			      </div>";
            else
            {
              //$userid=mysql_result($query_run,0,'userid');
              $this->role=mysql_result($query_run,0,'role');
              $this->verifypass=mysql_result($query_run,0,'password');
              $_SESSION['userid']=$userid;
              $_SESSION['role']=$this->role;
              $this->Verify();

                     
            }
          }
          else
            echo mysql_error();
      } else
        echo 'All Fields Required';


    }

    function Verify(){
	    if($this->verifypass==$this->pass){
	      header('Location: /FGMS/index.php');
	    }
	    else
	      echo "<br><div class='row'>
			      	<div class='col s6 offset-s4' style='color:red;'>
			      		Incorrect Password.
			      	</div>
			      </div>";
	}

 

}
?>
