<?php
	require_once(LIB_PATH.DS."database.php");
?>

<?php

class College extends DatabaseObject
{
	protected static $table_name = "college";
	protected static $menu_table_name = "college_menu";
	protected static $slider_table_name = "college_slider";
	protected static $slider_location = "college_slider";
	protected static $gallery_location = "college_gallery";
	private static $item_array = array();
	public $id;
	public $name;
	public $username;
	public $password;
	public $link;
	public $email;
	public $phone_number;
	
	function __construct()
	{
		self::set_item_array();
	}
	
	private static function set_item_array()
	{
		$query = "SELECT *
						FROM ".self::$menu_table_name
						." ORDER BY `position`";
		$item_array = self::find_by_query($query);

		foreach($item_array as $item)
		{
			self::$item_array[$item['id']] = array('id' => $item['id'], 'menu_id' => $item['menu_id'], 
			'parent' => $item['parent_id'], 'name' => $item['name'], 'link' => $item['link']);
		}
	}
	
	public static function authenticate($username="", $password="") 
	{
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
	
		$sql  = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$object_array = self::find_by_sql($sql);
		return !empty($object_array ) ? array_shift($object_array) : false;
	}
	
	
	// Common Database Methods

	public static function find_by_query($sql="")
	{
		global $database;
		$result_set = $database->query($sql);
		$result_array = array();
		while ($row = $database->fetch_assoc($result_set))
		{
			array_push($result_array, $row);
		}
		return $result_array;
	}
	/**************slider*************************************/
	public function add_slider_image($title, $name, $file_name)
	{
		global $database;
		$title = $database->escape_value($title);
		$name = $database->escape_value($name);
		$file_name = $database->escape_value($file_name);
		$query = "INSERT INTO `".self::$slider_table_name
						."`(`page_id`, `title`, `name`,`file_name`) 
						values('".$this->id
						."', '{$title}', '{$name}', '{$file_name}')";
		return $database->query($query) ? true : false;
	}
	
	public function remove_slider_image($id)
	{
		global $database;
		$sql = "DELETE FROM ".self::$slider_table_name;
		$sql .= " WHERE `page_id`=". $database->escape_value($this->id);
		$sql .= " AND `id`=".$database->escape_value($id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public function show_slider()
	{
		$query = "SELECT * FROM ".self::$slider_table_name
						." WHERE `page_id`='".$this->id."'";
		return self::find_by_query($query);
		/*foreach(self::find_by_query($query) as $slider)
		{
			echo "<img name=".$slider['title']." src=".SITE_ROOT.DS."public".DS."college_slider".DS.$slider['file_name']." width=\"32\" height=\"32\" alt=\"\" />";
		}*/
	}

	/*****************menu************************************/
	private function find_all_menu($mode)
	{
		switch($mode)
		{
			case "top":
					$query = "SELECT * FROM ".self::$menu_table_name 
						." WHERE `parent_id`=0 AND `position`=0 AND `is_title`=1 AND `page_id`=".$this->id 
						." ORDER BY `position` ASC LIMIT 1";
					return self::find_by_query($query);
					
			case "side":
					$query = "SELECT * FROM ".self::$menu_table_name 
						." WHERE `parent_id`=0 AND `position`!=0 AND `is_title`=1 AND `page_id`=".$this->id 
						." ORDER BY `position` ASC";
					return self::find_by_query($query);
			
			case "list":
					$query = "SELECT * FROM ".self::$menu_table_name 
						." WHERE `parent_id`=0 AND `is_title`=1 AND `page_id`=".$this->id 
						." ORDER BY `position` ASC";
					return self::find_by_query($query);
		}
	}
	
	private function menu_items($parent_id, $menu_id)
	{
		$has_childs = false;
		
		foreach(self::$item_array as $items => $item)
		{
			if ($item['parent'] == $parent_id) 
			{
				if($item['parent'] !=$menu_id and $has_childs === false)
				{
					$has_childs = true;
					echo '<ul>';                
				}
				echo "<li><a href=\"{$item['link']}\">{$item['name']}</a>";
				$this->menu_items($item['id'], $menu_id);
				echo '</li>';
			}
		}
		if ($has_childs === true) echo '</ul>';
	}
	
	public function menu($mode)
	{
		$menus = $this->find_all_menu($mode);
		if($mode == "top")
		{
			echo "<ul>";
			$this->menu_items($menu['id'] ,$menu['id']);
			echo "</ul>";
		}
		else
		{
			foreach($menus as $menu)
			{
				echo "<h1>".$menu['name']."</h1>";
				echo "<ul>";
				$this->menu_items($menu['id'] ,$menu['id']);
				echo "</ul>";
			}
		}
	}
	
	public function menu_list()
	{
		$menus = $this->find_all_menu("list");
		echo "<option value=\"0\">افزودن منو جدید</option>";
		foreach ($menus as $menu)
		{
			echo "<option value='{$menu['id']}'>{$menu['name']}</option>";
		}
	}
	
	private static function fetch_parent($child_id, $menu_id)
	{			
		if(self::$item_array[$child_id]['parent'] !=0)// and $this->list_array[$child_id]['menu_id'] == $menu_id)
		{
			self::fetch_parent(self::$item_array[self::$item_array[$child_id]['parent']]['id'], $menu_id);
			if(self::$item_array[self::$item_array[$child_id]['parent']]['id'] != 1)
			{
				echo self::$item_array[self::$item_array[$child_id]['parent']]['name'];
				echo '>>';
			}
		}
	}
	
	
	public static function item_list($menu_id)
	{		
		foreach(self::$item_array as $items => $item)
		{
			if ($item['menu_id'] == $menu_id) 
			{
				echo "<option value=".$item['id'].">";
				self::fetch_parent($item['id'], $menu_id);                              
				echo $item['name'];
				self::item_list($item);
				echo '</option>';
			}
		}
	}

}

?>