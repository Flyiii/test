<?php

function display($tplFile,$tplVars=null,$isInclude=true)
{
	//保存原有的文件名
	$backFile = $tplFile;
	//
	$tplFile = TPL_PATH . $tplFile;
	//1、判断模板文件是否存在
	if (!file_exists($tplFile)) {
		exit($tplFile.'模板文件不存在');
	}
	//2、确定文件路径名:test.html => test_html.php
	$savePath = TPL_CACHE.str_replace('.','_',$backFile) . '.php';
	if (!file_exists($savePath) 
		|| filemtime($tplFile) > filemtime($savePath)) {
		//3、完成模板文件特定规则的替换
		$content = compile($tplFile);
		//4、保存编译后的文件
		file_put_contents($savePath,$content);
	}
	//5、将数组中的数据导入到符号表
	if (is_array($tplVars)) {
		extract($tplVars);
	}
	//6、包含编译后的文件
	if ($isInclude) {
		include $savePath;
	}	
}

function compile($file)
{
	//1、读取文件内容
	$content = file_get_contents($file);
	/*{$title}	=>	<?=$title;?>*/
	$keys = [
				
				'{#%%}' => '<?php \1;?>',
				'{=%%}' => '<?= \1;?>',
				'{$%%}'			=>	'<?=$\1;?>',
				'{if %%}'		=>	'<?php if (\1): ?>',
				'{else}'		=>	'<?php else: ?>',
				'{elseif %%}'	=>	'<?php elseif (\1): ?>',
				'{else if %%}'	=>	'<?php else if (\1): ?>',
				'{/if}'			=>	'<?php endif; ?>',
				'{foreach %%}'=>'<?php foreach (\1):?>',
				'{/foreach}'=>'<?php endforeach;?>',
				'{echo %%}'=>'<?php echo (\1);?>',
				'{include %%}'	=>	'这里是骗人的',
				/*自己添加：for foreach while break continue*/				
			];
	//2、循环按照指定的规则进行替换
	foreach ($keys as $key => $value) {
		$key = preg_quote($key,'#');
		//'\{$%%\}'
		$reg = '#' . str_replace('%%','(.+)',$key) . '#U';
		//'#\{$(.+)\}#'
		if (stripos($key,'include')) {	//是文件包含
			$content = preg_replace_callback($reg,'dealInclude',$content);
		} else {						//不是文件包含
			$content = preg_replace($reg,$value,$content);
		}		
	}
	//3、返回替换后的文件内容
	return $content;
}

function dealInclude($matches)
{
	//$matches[1] 	<==>	'"03-footer.html"'
	$file = trim($matches[1],'\'"');
	//$file			<==>	03-footer.html
	display($file,null,false);
	$cacheFile = TPL_CACHE . str_replace('.','_',$file).'.php';
	//$cacheFile	<==> 	03-footer_html.php
	return "<?php include '$cacheFile'; ?>";
}