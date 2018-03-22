<?php

include './common/home.php';

$key = trim($_GET['serrch']);
	if(!$key)
	{
		$msg = '<font color=red><b>没有输入关键词</b></font>';
		include 'action.php';
		exit;
	}
$arrKey = explode(' ',$key);
	$where = '';
	for($i=0; $i<count($arrKey); $i++)
	{
		if(empty($where))
		{
			$where .= "title like '%$arrKey[$i]%'";
		}else{
			$where .= " or title like '%$arrKey[$i]%'";
		}
	}
$where = ' and (' . $where . ')';

	$cSearch = dbSelect($link,'posts', 'count(id)', 'rid=0 and isdelete=0 ' . $where);
	
	$select = 't.id as id,t.uid as uid,t.content as content,t.createtime as createtime,t.title as title,t.pid as pid,t.replytotal as replytotal,t.visittotal as visittotal,u.id as id,u.name as name,c.name as name';
	$search = dbSelect($link,'posts as t,user as u,plate as c',$select,'t.uid=u.id and c.id=t.pid and rid=0 and t.isdelete=0 '.$where.'','t.id desc');
	/* var_dump($search); */
   
	$title = $key . '的搜索结果';
$vars = compact('title','key','cSearch','search','arrKey','replytotal','visittotal');
display('/home/search.html',$vars);

