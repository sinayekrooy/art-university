<?php
	require_once("initialize.php");
?>

<?php

$college = College::find_by_id(1);

$college->menu("side");

//if($college->add_slider_image($title="test", $name="", $file_name="")) { echo "Hello"; }

print_r($college->show_slider());

?>
<select name="" multiple="multiple">
	<?php echo College::item_list(1); ?>
</select>

