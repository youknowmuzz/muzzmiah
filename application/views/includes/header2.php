<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv= "Content-Type" content="text/html; charset-utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/jquery-1.8.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/main.js') ?>"></script>
<title></title>

</head>

<body>

<form method="get" action="<?php echo base_url() . 'index.php/login/logout'; ?>">
<input type="Submit" value="Logout" />
</form>
	<table >
		<tr>
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/find/'; ?>"><INPUT TYPE="submit" VALUE="Search"></td></FORM></FORM></td> 
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/find/add'; ?>"><INPUT TYPE="submit" VALUE="Add"></td></FORM></FORM></td> 
			<td><form method="get" action="<?php echo base_url() . 'index.php/find/update'; ?>"><input type="submit" value="Edit"/></form></td> </form></td>
			<td><form method="get" action="<?php echo base_url() . 'index.php/find/delete'; ?>"><input type="submit" value="Remove"/></form></td> </form></td>

		</tr>


	</table>

	<hr/>
