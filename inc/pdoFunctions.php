<?php
function safe_str($value)
{
    return ($value);
}

class PDOFUNCTION
{
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }
	function add($table_name, $prop_details)//INSERT Row
    {
        $sql = "INSERT INTO $table_name (";
        foreach ($prop_details as $c => $d) {
            $sql .= "`$c`,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (";
        foreach ($prop_details as $c => $d) {
            $sql .= ":" . $c . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ")";
        try {
			$ret = $this->db->prepare($sql);
            $ret->execute($prop_details);
            $out = 1;
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	function addID($table_name, $prop_details)//INSERT Row and return id
    {
        $sql = "INSERT INTO $table_name (";
        foreach ($prop_details as $c => $d) {
            $sql .= "`$c`,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (";
        foreach ($prop_details as $c => $d) {
            $sql .= ":" . $c . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ")";
        try {
            $ret = $this->db->prepare($sql);
            $ret->execute($prop_details);
            $out = $this->db->lastInsertId();
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }

    function update($table_name, $prop_details, $prop_id)
    {
        $sql = "UPDATE `$table_name` SET ";
        
		foreach ($prop_details as $c => $d) {
            $sql .= $c ."=:" . $c . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE 1=1";
        foreach ($prop_id as $v => $k) {
            $sql .= " AND " . $v ."=:" . $v;
			$prop_details[$v]=$k;
        }
        try {
            $ret = $this->db->prepare($sql);
            $ret->execute($prop_details);
            $out = 1;
        } catch (PDOException $e) {
            $out = 2;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	
	function UpdateMultiple($table_name, $field_name , $prop_key, $prop_cond)
    {

        try {
            $updateIDsSQL = implode(',', array_fill(0, count($prop_cond), '?'));
            $query = "UPDATE `" . $table_name . "` SET " . $field_name . " WHERE $prop_key IN (" . $updateIDsSQL . ")";
            $ret = $this->db->prepare($query);
            $i = 0;
            foreach ($prop_cond as &$id) {
                $ret->bindParam(++$i, $id, PDO::PARAM_INT);
            }
            $ret->execute();
            $out = 1;
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	function checkField($countfield, $table_name, $field_cond)
    {
        try {
            $qry = 'SELECT count('.$countfield.') FROM `' . $table_name . '` WHERE ';
            foreach ($field_cond as $k => $v) {

                $qry .= $k;
                $qry .= $k == "id" ? "!" : "";
                $qry .= "=:" . $k . " and ";
            }
            $qry = substr($qry, 0, -5);
            $ret = $this->db->prepare($qry);
            $ret->execute($field_cond);
            $rows = $ret->fetch(PDO::FETCH_NUM);
            $out = $rows[0];
        } catch (PDOException $e) {
            $out = "error";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
    function counts($column,$table_name, $prop_id)//FOR ALREADY EXIST CHECK
    {
        try {
            $qry = 'SELECT COUNT('.$column.') FROM `' . $table_name . '` ';
			$qry .= " WHERE 1=1";
			foreach ($prop_id as $v => $k) {
            $qry .= " AND " . $v ."=:" . $v;
			$prop_details[$v]=$k;
        }
            $ret = $this->db->prepare($qry);
            $ret->execute($prop_details);
            $rows = $ret->fetch(PDO::FETCH_NUM);
            $out = $rows[0];
        } catch (PDOException $e) {
            $out = "error";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }

    function get($column, $table_name, $prop_cond)//for fetching single row based on where
    {
        $sql = 'SELECT '.$column.' FROM ' . $table_name ;
        try {
            $sql .= " WHERE 1=1";
            foreach ($prop_cond as $v => $k) {
            $sql .= " AND " . $v ."=:" . $v;
			$prop_details[$v]=$k;
       		}
			$ret = $this->db->prepare($sql);
            $ret->execute($prop_details);
            $out = $ret->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }

	function get_Disp($sql)//for fetching single row based on full query
   {
       
       try {
           $ret = $this->db->query($sql);
           $out = $ret->fetch(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
           $out = 0;
           file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
       }
       return $out;
   }
   
    function getSum($column, $alas, $tbl, $prop_cond)
    {
        try {
			$sql .= " WHERE 1=1";
            foreach ($prop_cond as $v => $k) {
                $sql .= " AND `$v`='$k'";
            }
            $ret = $this->db->query('SELECT SUM(' . $column . ') as ' . $alas . ' FROM ' . $tbl . ' ' . $sql);
            $out = $ret->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }

    function getAll($coulmn,$table_name, $prop_cond, $order, $lower_limit = 0, $rows_per_page = 0)//select all row with condition,orderby,limit for pagination.
    {
		$limit = '';
        if ($rows_per_page)
            $limit = ' LIMIT ' . $lower_limit . ',' . $rows_per_page;

        try {
            $ret = $this->db->query('SELECT '.$coulmn.' FROM `' . $table_name . '`' . $prop_cond . $order . $limit);
            $out = $ret->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }

	function getAll_Disp($sql)/*select all row by passing query*/
    {
        try {
            $ret = $this->db->query($sql);
            $out = $ret->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $out = 0;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	
	function getName($column, $table, $where)
    {
        try {
            $ret = $this->db->query('SELECT ' . $column . ' FROM ' . $table . ' WHERE ' . $where);
            $out = $ret->fetchColumn();
        } catch (PDOException $e) {
            $out = '';
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	
    function Delete($table_name, $field_name , $prop_cond)
    {//For Delete Multiple

        try {
            $deleteIDsSQL = implode(',', array_fill(0, count($prop_cond), '?'));
            $query = "DELETE FROM `" . $table_name . "` WHERE " . $field_name . " IN (" . $deleteIDsSQL . ")";
            $ret = $this->db->prepare($query);
            $i = 0;
            foreach ($prop_cond as &$id) {
                $ret->bindParam(++$i, $id, PDO::PARAM_INT);
            }
            $ret->execute();
            $out = 1;
        } catch (PDOException $e) {
            $out = 2;
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        return $out;
    }
	/* $no is length of number,
		$action = 0 no use database only access generate number
		$action = 1 use database check
	*/
	function random($no,$action,$column,$table_name, $prop_id)
	{
		
		$unique_ref_length = $no;  
		$unique_ref_found = false;  
		  
		$possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";  
		while (!$unique_ref_found) {  
		  
			$unique_ref = "";  
			$i = 0;  
			while ($i < $unique_ref_length) {  
			  
				$char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
				  
				$unique_ref .= $char;  
				  
				$i++;  
			  
			}  
			if($action==1){  
				$where_arr[$prop_id] = $unique_ref;
				$count = $this->counts($column,$table_name, $where_arr); 
				if ($count==0) {  
				  
					$unique_ref_found = true;  
				}  
			}else{
				$unique_ref_found = true;  
			}
		}  
		return $unique_ref;  
	}
}
$cdb = new DB();
$db = $cdb->getDb();
$prop = new PDOFUNCTION($db);

?>