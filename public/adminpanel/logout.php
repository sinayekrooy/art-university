<?php
	require_once("../../includes/initialize.php");
?>

<?php

if (!$session->is_logged_in()) { redirect_to("login.php"); }
else
{
	$college = College::find_by_id($session->user_id);
	$session->logout();
	if (!$session->is_logged_in()) { redirect_to("login.php"); }

}

?>