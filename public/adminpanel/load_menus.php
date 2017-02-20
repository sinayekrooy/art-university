<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");
if($_GET['method']=="pages")
{
?>
<label class="control-label" for="selectError1">مربوط به منو: </label>
<div class="controls">
  <select id="selectError1" onchange="showmenus('pages2');" data-rel="chosen">
	<?php menus_list($_GET['q']); ?>
  </select>
</div>
<?php
}
else
{
?>
<label class="control-label" for="selectError2">زیر مجموعه : </label>
<div class="controls">
  <select id="selectError2" data-rel="chosen">
	<?php parent_list($_GET['q']); ?>
  </select>
</div>
<?php
}
?>