<?php
require 'connect.php';
require 'layout.php';


if(isset($_POST['userid']) && isset($_POST['password'])) {
require 'classlogin.php';
$check = new login;
$check->userid=$_POST['userid'];
$check->pass=$_POST['password'];
$check->GetUserDetails($_POST['userid']);
//$check->Verify();
}
?>

<html>
<head>
  <title>Log In</title>
</head>
<body>
    <br>
    <br>
    <form class="col s12" action="" method="post">
      <div class="row">
        <div class="input-field col s3 offset-s4">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="userid" required>
          <label for="icon_prefix">User Id</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3 offset-s4">
          <i class="material-icons prefix">fingerprint</i>
          <input id="password" type="password" class="validate" name="password" required>
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3 offset-s4">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">play_circle_filled</i>
          </button>
        </div>
      </div>
    </form>

</body>
</html>

  
    
 