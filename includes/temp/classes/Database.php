<?php

class Database{
	private	$dbName;
	private $dbUser;
	private $dbPassword;
	private $dbHost;
	private $lists = array(">","<");
	private $link;
	
	public function connect($name="iau", $user="root", $pass="", $host = "localhost")
	{
		$this->dbName = $name;
		$this->dbUser = $user;
		$this->dbPassword = $pass;
		$this->dbHost = $host;
		$this->link = mysql_connect("$this->dbHost","$this->dbUser","$this->dbPassword") or die ("Couldn't connect to server.");
		$db = mysql_select_db("$this->dbName", $this->link) or die ("Couldn't select database.");
		if($db)
		{	
			$R = mysql_query("SET CHARACTER SET 'utf8';");  
			$R= mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");  
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function close()
	{
		mysql_close($this->link);
	}
	
	public function select(array $fields, $table, $condition = "",$order= " order by `id` ")
	{
		$query = "select ";
		foreach($fields as $field)
		{
			$query .= $field . ", ";
		}
		$query = substr($query, 0, strlen($query) - 2);
		if($condition == "")
		{
			$query .= " from ". $table . $order;
		}
		else
		{
			$query .= " from ". $table . " where " . $condition . $order;
		}
		$result = mysql_query($query);
		$rows = array();
		$index = 0;
		while($row = mysql_fetch_array($result))
		{
			array_push($rows, $row);
		}
		return $rows;
	}
	
	public function numberOfRows(array $fields, $table, $condition)
	{
		$query = "select ";
		foreach($fields as $field)
		{
			$query .= $field . ", ";
		}
		$query = substr($query, 0, strlen($query) - 2);
		$query .= " from ". $table . " where " . $condition;
		$result = mysql_query($query);
		return mysql_num_rows($result);
	}
	
	public function insert(array $data, $table)
	{
		$table = htmlentities(mysql_real_escape_string($table));
		$query = "insert into $table ";
		$a = "(";
		$b = "(";
		foreach($data as $field=>$value)
		{
			if($value=='')
			continue;
			else
			{$a .= mysql_real_escape_string($field).", ";
			$b .= "'".mysql_real_escape_string($value)."', ";}
		}
		
		$a = substr($a, 0, strlen($a) - 2);
		$b = substr($b, 0, strlen($b) - 2);
		$a .= ")";
		$b .= ")";
		$query = $query.$a." VALUES ".$b;
		$result = mysql_query($query);
		if($result)
		{
			return true;
		}
		else
		{
			return mysql_error();
		}
	}
	public function update(array $data, $table, $item)
	{
		$table = str_replace($this->lists, "", mysql_real_escape_string($table));
		$query = "update $table set ";
		foreach($data as $field=>$value)
		{
			$query .= mysql_real_escape_string($field)." = '".mysql_real_escape_string($value)."', ";
		}
		$query = substr($query, 0, strlen($query) - 2);
		$query .= " where ".$item['field']." = '".$item['data']."'";
		$result = mysql_query($query);
		if($result)
		{
			return true;
		}
		else
		{
			return mysql_error();
		}
	}
	
	public function delete($table, $item, $OrAnd)
	{
		$table = str_replace($this->lists, "", mysql_real_escape_string($table));
		$query = "delete from $table where ";
		foreach($item as $field=>$value)
		{
			$query .= mysql_real_escape_string($field)." = '".mysql_real_escape_string($value)."' ".$OrAnd." ";
		}
		$query = substr($query, 0, strlen($query) - 4);
		$result = mysql_query($query);
		if($result)
		{
			return true;
		}
		else
		{
			return mysql_error();
		}
	}
	public function deleteLastInsert($table)
	{
		$query = "delete from $table order by id desc limit 1";
		mysql_query($query);
	}
}


function ct($field,$real=false)
{
	
	$arr = array("<", ">");
	$arr2 = array("&lt;", "&gt;");
	$result = str_replace($arr, $arr2, $field);
	if($real)
	return mysql_real_escape_string($result);
	else
	return $result."";
}