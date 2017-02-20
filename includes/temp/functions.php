<?php
// This file is the place to store all basic functions

function confirm_query($result_set) {
    if (!$result_set) {
            die("Database query failed: " . mysql_error());
    }
}

function list_groups($parent_id, $menu_id)
{
    $has_childs = false;
    global $menu_array;
    
    foreach($menu_array as $item => $colum)
    {
        if ($colum['parent'] == $parent_id and $colum['menu'] == $menu_id) 
        {
            if($colum['parent'] !=0 and $has_childs === false)
            {
                $has_childs = true;
                echo '<ul>';                
            }
            echo "<li><a href=\"{$colum['link']}\">{$colum['name']}</a>";
            list_groups($colum['id'], $menu_id);
            echo '</li>';
        }
    }
    if ($has_childs === true) echo '</ul>';
}

function fetch_parent($child_id)
{
    global $scroll_items;
        
    if($scroll_items[$child_id]['parent'] !=0)
    {
        fetch_parent($scroll_items[$scroll_items[$child_id]['parent']]['id']);
        echo $scroll_items[$scroll_items[$child_id]['parent']]['name'];
        echo '>>';
    }
}

function scroll_groups($parent)
{
    global $scroll_items;
    
    foreach($scroll_items as $item => $colum)
    {
        if ($colum['parent'] == $parent) 
        {
            echo "<option>";
                fetch_parent($colum['id']);               
                //echo $scroll_items[$colum['parent']]['name'];
                //echo '>>';                
            echo $colum['name'];
            scroll_groups($item);
            echo '</option>';
        }
    }
}

function top_menu($page_id)
{
    global $connection;
    
    $query = "SELECT *
                    FROM `menus`
                    WHERE `position`=0 AND `page_id`={$page_id} AND `visible`=1
                    ORDER BY `position` ASC";
    $get_menus = mysql_query($query, $connection);
    confirm_query($get_menus);

    while ($menus = mysql_fetch_assoc($get_menus))
    {
        global $menu_array;
        $query = "SELECT *
                        FROM `menu_items`
                        WHERE `visible`=1
                        ORDER BY `position`";
        $groups_res = mysql_query($query, $connection);
        while($groups = mysql_fetch_assoc($groups_res))
        {
            $menu_array[$groups['id']] = array('id' => $groups['id'], 'menu' => $groups['menu_id'], 'parent' => $groups['parent_id'], 'name' => $groups['name'], 'link' => $groups['link']);
        }
        echo "<ul>";
        list_groups(0, $menus['id']);
        echo "</ul>";
    }
}

function side_menu($page_id)
{
    global $connection;
    
    $query = "SELECT *
                    FROM `menus`
                    WHERE `position`!=0 AND `page_id`={$page_id} AND `visible`=1
                    ORDER BY `position` ASC";
    $get_menus = mysql_query($query, $connection);
    confirm_query($get_menus);

    while ($menus = mysql_fetch_assoc($get_menus))
    {
        global $menu_array;
        $query = "SELECT *
                        FROM `menu_items`
                        WHERE `visible`=1
                        ORDER BY `position`";
        $groups_res = mysql_query($query, $connection);
        while($groups = mysql_fetch_assoc($groups_res))
        {
            $menu_array[$groups['id']] = array('id' => $groups['id'], 'menu' => $groups['menu_id'], 'parent' => $groups['parent_id'], 'name' => $groups['name'], 'link' => $groups['link']);
        }
        echo "<div class=\"title\">
                <h1>{$menus['title']}</h1>
            </div><ul>";
        list_groups(0 ,$menus['id']);
        echo "</ul>";
    }
}

function page_list()
{
    global $connection;
    
    $query = "SELECT *
                    FROM `pages`
                    ORDER BY `id` ASC";
    $get_pages = mysql_query($query, $connection);
    confirm_query($get_pages);
    
    while ($page = mysql_fetch_assoc($get_pages))
    {
        echo "<option value='{$page['id']}'>{$page['title']}</option>";
    }
}

function menus_list($page_id)
{
    global $connection;
    
    $query = "SELECT *
                    FROM `menus`
                    WHERE `page_id` = '$page_id'
                    ORDER BY `position` ASC";
    $get_menus = mysql_query($query, $connection);
    confirm_query($get_menus);
    
    while ($menu = mysql_fetch_assoc($get_menus))
    {
        echo "<option value='{$menu['id']}'>{$menu['title']}</option>";
    }
}

function parent_list($menu_id)
{
    global $connection;
    global $scroll_items;


    $query = "SELECT *
                    FROM `menu_items`
                    WHERE `menu_id`={$menu_id}
                    ORDER BY `position` ASC";
    $get_items = mysql_query($query);
    confirm_query($get_items);
    
    while ($item = mysql_fetch_assoc($get_items))
    {
        $scroll_items[$item['id']] = array('id' => $item['id'], 'menu' => $item['menu_id'], 'parent' => $item['parent_id'], 'name' => $item['name'], 'link' => $item['link']);  
    }
    scroll_groups(0);    
}

?>