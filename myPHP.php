<?php
    require_once("includes/connection.php");
    require_once("includes/functions.php"); 
?>

<?php

$query = "SELECT *
                FROM `menus`
                WHERE `position`=0 AND `visible`=1
                ORDER BY `position` ASC";
$get_menus = mysql_query($query, $connection);
confirm_query($get_menus);

while ($menus = mysql_fetch_array($get_menus))
{
    //if($menus['position'] == 0)
    //{
        global $menu_array;
        global $connection;
        $query = "SELECT *
                        FROM `menu_items`
                        WHERE `visible`=1
                        ORDER BY `position`";
        $groups_res = mysql_query($query, $connection);
        while($groups = mysql_fetch_array($groups_res))
        {
        $menu_array[$groups['id']] = array('id' => $groups['id'], 'menu' => $groups['menu_id'], 'parent' => $groups['parent_id'], 'name' => $groups['name'], 'link' => $groups['link']);
        }
        echo "<h2>{$menus['title']}</h2><ul>";
        list_groups(0, $menus['id']);
        echo "</ul>";
    //}
    /*else
    {
        global $menu_array;
        global $connection;
        $query = "SELECT *
                        FROM `menu_items`
                        WHERE `visible`=1
                        ORDER BY `position`";
        $groups_res = mysql_query($query, $connection);
        while($groups = mysql_fetch_array($groups_res))
        {
        $menu_array[$groups['id']] = array('id' => $groups['id'], 'menu' => $groups['menu_id'], 'parent' => $groups['parent_id'], 'name' => $groups['name'], 'link' => $groups['link']);
        }
        echo "<h2>{$menus['title']}</h2><ul>";
        list_groups(0, $menus['id']);
        echo "</ul>";
    }*/
}

/*global $menu_array;
global $connection;
$query = "SELECT *
                FROM `menu_items`
                WHERE `visible`=1
                ORDER BY `position`";
$groups_res = mysql_query($query, $connection);
while($groups = mysql_fetch_array($groups_res))
{
$menu_array[$groups['id']] = array('id' => $groups['id'], 'menu' => $groups['menu_id'], 'parent' => $groups['parent_id'], 'name' => $groups['name'], 'content' => $groups['content']);
}*/



?>