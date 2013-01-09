<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>
	<div class="wrapper">
<form action="<?php echo site_url('login/validate_credentials') ?>" method="post">
    Username: <input type="text" name="username"/> <br/>
    Password: <input type="password" name="password"/> <br/>
    <input type="Submit" value="Login">
</form>
</div>
</body>
</html>