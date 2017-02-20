<?php
	require_once("db_config.php");
?>

<?php

class Database
{	
    private $connection;
    public $last_query;
    private $magic_quotes_active;
    private $real_escape_string_exists;
	
    function __construct()
    {
        $this->open_connection();
    	$this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
    }
    
    public function open_connection()
    {
        $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
        if (!$this->connection)
        {
            die("Database connection failed: " . mysql_error());
        }
        else
        {
            $db_select = mysql_select_db(DB_NAME, $this->connection);
            if (!$db_select)
            {
                die("Database selection failed: " . mysql_error());
	    }
    	}
    }
    
    public function get_connection()
    {
        return $this->connection;
    }
    
    public function close_connection()
    {
        if(isset($this->connection))
        {
            mysql_close($this->connection);
            unset($this->connection);
        }
    }
    
    private static function sth()
    {
	var srth;	
    }
    
    public function query($sql)
    {
        $this->last_query = $sql;
        $result = mysql_query($sql, $this->connection);
        $this->confirm_query($result);
        return $result;
    }
    
    public function escape_value( $value )
    {
        if( $this->real_escape_string_exists )
        {
            // PHP v4.3.0 or higher
            // undo any magic quote effects so mysql_real_escape_string can do the work
            if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
            $value = mysql_real_escape_string( $value );
        }
        else
        {
            // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manually
            if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }
    
    private function confirm_query($result)
    {
    	if (!$result)
        {
            $output = "Database query failed: " . mysql_error() . "<br /><br />";
            $output .= "Last SQL query: " . $this->last_query;
            die( $output );
        }
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
        $query = $this->escape_value($query);
        $result = $this->query($query);
        $rows = array();
        $index = 0;
        while($row = mysql_fetch_array($result))
        {
                array_push($rows, $row);
        }
        return $rows;
    }
    
    public function number_of_rows(array $fields, $table, $condition)
    {
	$query = "select ";
	foreach($fields as $field)
	{
	    $query .= $field . ", ";
	}
	$query = substr($query, 0, strlen($query) - 2);
	$query .= " from ". $table . " where " . $condition;
        $query = $this->escape_value($query);
	$result = $this->query($query);
	return mysql_num_rows($result);
    }
    
    public function insert(array $data, $table)
    {
        $table = $this->escape_value($table);
        $query = "insert into $table ";
        $a = "(";
        $b = "(";
        foreach($data as $field=>$value)
        {
            if($value=='')
            continue;
            else
            {$a .= $this->escape_value($field).", ";
            $b .= "'".$this->escape_value($value)."', ";}
        }
        $a = substr($a, 0, strlen($a) - 2);
        $b = substr($b, 0, strlen($b) - 2);
        $a .= ")";
        $b .= ")";
        $query = $query.$a." VALUES ".$b;
        $result = $this->query($query);
        if($result)
        {
                return true;
        }
    }
        

    public function update(array $data, $table, $item)
    {
        $table =$this->escape_value($table);
        $query = "update $table set ";
        foreach($data as $field=>$value)
        {
                $query .= $this->escape_value($field)." = '".$this->escape_value($value)."', ";
        }
        $query = substr($query, 0, strlen($query) - 2);
        $query .= " where ".$item['field']." = '".$item['data']."'";
        $result = $this->query($query);
        if($result)
        {
                return true;
        }
    }
    
    public function delete($table, $item, $OrAnd)
    {
        $table = $this->escape_value($table);
        $query = "delete from $table where ";
        foreach($item as $field=>$value)
        {
            $query .= $this->escape_value($field)." = '".$this->escape_value($value)."' ".$OrAnd." ";
        }
        $query = substr($query, 0, strlen($query) - 4);
        $result = $this->query($query);
        if($result)
        {
            return true;
        }
    }
    
    public function delete_last_insert($table)
    {
        $query = "delete from $table order by id desc limit 1";
        $this->query($query);
    }
    
}

$Database = new Database();
$db =& $Database;

?>