<?php

/**
*	函数功能
*	参数介绍
*	返回值
*/
function dbConnect($host,$user,$pwd,$name,$charset)
{
	$link = mysqli_connect($host,$user,$pwd);
	if (!$link) {
		return false;
	}
	if (!mysqli_select_db($link,$name)) {
		mysqli_close($link);
		return false;
	}
	mysqli_set_charset($link,$charset);
	
	return $link;
}

//['username'=>'xiaoming']
function dbInsert($link,$table,$data,$getId=false)
{
	$data = addQuote($data);
	
	$fields = join(',', array_keys($data));
	$values = join(',', array_values($data));
	
	$sql = "insert $table($fields) values($values)";
    /* echo $sql;
	exit; */ 
	$result = mysqli_query($link,$sql);
	if ($result && mysqli_affected_rows($link)) {
		if ($getId) {
			return mysqli_insert_id($link);
		}
		return true;
	} 
	return false;
}

function dbDelete($link,$table,$where)
{
	$where = parseWhere($where);
	if (is_null($where)) {
		exit('删除时必须传where条件');
	}
	$sql = "delete from $table where $where";
    /* echo $sql;
	exit;  */
	$result = mysqli_query($link,$sql);
	if ($result && mysqli_affected_rows($link)) {
		return true;
	}
	return false;
}

function dbUpdate($link,$table,$set,$where)
{
	if (is_array($set)) {
		$set = parseSet($set);
	} 
	$where = parseWhere($where);
	if (is_null($where)) {
		exit('更新数据必须传where条件');
	}
	$sql = "update $table set $set where $where";
     /* echo $sql; */ 
	/*exit; */  
	$result = mysqli_query($link,$sql);
	if ($result && mysqli_affected_rows($link)) {
		return true;
	} 
	return false;
}

function dbSelect($link,$table,$fields='*',$where=null,$orderby=null,$limit=null)
{
	if (is_array($fields)) {
		$fields = join(',', $fields);
	}
	$sql = "select $fields from $table";
	$where = parseWhere($where);
	if ($where) {
		$sql .= ' where ' . $where;
	}
	if ($orderby) {
		$sql .= ' order by ' . $orderby;
	}
	if ($limit) {
		$sql .= ' limit ' . $limit;
	}
	// echo $sql;  
	// exit;   
	$result = mysqli_query($link,$sql);
	if ($result && mysqli_num_rows($result)) {
		return mysqli_fetch_all($result,MYSQLI_BOTH);
	}
	return false;
}

function addQuote($data)
{
	foreach ($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = '\'' . $value . '\'';
		}
	}
	return $data;
}

function parseSet($data)
{
	$data = addQuote($data);
	$set = [];
	foreach ($data as $key => $value) {
		$set[] = $key . '=' . $value; 
	}
	return join(',', $set);
}

function parseWhere($where)
{
	if (is_array($where)) {
		return join(' and ',$where);
	} else if (is_string($where)) {
		return $where;
	} else {
		return null;
	}
}








