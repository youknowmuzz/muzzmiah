Are you sure you want to delete <?php echo $emp_no; ?> ?

<form method="get" action="<?php echo site_url('site/deleteemp') ?>">
<input type="submit" value="Delete" />
<input type="hidden" id="emp_no" value="<?php echo $emp_no; ?>" name="emp_no"/>
</form>