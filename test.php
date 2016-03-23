
<<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="/FGMS/css/google_font.css" rel="stylesheet">
  	<link href="/FGMS/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	
<label>password :
    <input name="password" id="password" type="password" />
</label>
<br>
<label>confirm password:
    <input type="password" name="confirm_password" id="confirm_password" /> <span id='message'></span>

<script type="text/javascript">
$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
});
</script>

</body>
</html>
