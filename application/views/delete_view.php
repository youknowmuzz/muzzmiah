Are you sure you want to delete <?php echo $emp_no; ?> ?

<form method="get" action="<?php echo site_url('find/deleteemployee') ?>">
	<input type="text" name="emp_no" />
	<input type="submit" value="Delete" />
</form>