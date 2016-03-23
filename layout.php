

<?php

require 'core.php';

$additional_tabs='<li><a href="/FGMS/login.php" class="waves-effect waves-green"> <b>Log In</b><i class="material-icons left">play_arrow</i></a></li> 
	<li><a href="/FGMS/register.php" class="waves-effect waves-green"> <b>Register</b><i class="material-icons left">playlist_add</i></a></li>';


if(loggedin()) {
	$user_id=$_SESSION['userid'];
	$query="SELECT name FROM users WHERE userid='".$user_id."'";
	$query_run=mysql_query($query);
	$name=mysql_result($query_run,0,'name');
	$additional_tabs='<li><a href="/FGMS/logout.php" class="waves-effect waves-green"> <b>Log Out</b><i class="material-icons left hide-on-med-and-down">power_settings_new</i></a></li>';
	if($_SESSION['role']==1 || $_SESSION['role']==2){
		$additional_tabs='<li><a href="service_book.php" class="waves-effect waves-green"><b>Service Book</b><i class="material-icons left hide-on-med-and-down">library_books</i></a></li>
			<li><a href="/FGMS/search.php" class="waves-effect waves-green"> <b>Search</b><i class="material-icons left hide-on-med-and-down">search</i></a></li>
			<li><a href="/FGMS/logout.php" class="waves-effect waves-green"> <b>Log Out</b><i class="material-icons left hide-on-med-and-down">power_settings_new</i></a></li>';

	}
}




?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>FGMS</title>

	<link href="/FGMS/css/google_font.css" rel="stylesheet">
  	<link href="/FGMS/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<header>
		<div class="navbar-fixed" style="z-index: 999">
			<nav>
				<div class="nav-wrapper">
					<a href="/FGMS/index.php" class="brand-logo">&nbsp;&nbsp;&nbsp;F.G.M.S.</a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<?php if(loggedin()) echo "<li>Hi ".$name."!</li>";?>
						
						<li><a href="/FGMS/index.php" class="waves-effect waves-green"><i class="material-icons left">home</i><b>Home</b></a></li>
						
						<?php echo $additional_tabs; ?>


					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a href="/FGMS/index.php" class="waves-effect waves-green"><i class="material-icons left">home</i><b>Home</b></a></li>
						
						<?php echo $additional_tabs; ?>


					</ul>

				</div>
			</nav>
		</div>
	</header>
  <!--  Scripts-->
  <script src="/FGMS/js/jquery-2.1.1.min.js"></script>
  <script src="/FGMS/js/materialize.js"></script>
  <script src="/FGMS/js/init.js"></script>
</body>
</html>
