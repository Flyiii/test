 <html>
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://localhost/mybbs/public/css/ht1.css" type="text/css"/>
	</head>
	<body> 
			
			<!--left start-->
			<div id = "down">
				<div id = "left">
					<div class="left_ul">
					<ul>
						<li><a href="admin_index.php?htid=10">帖子管理</li>
						<li><a href="admin_index.php?htid=11">帖子回收站</li>
						<li><a href="admin_index.php?htid=12">回帖管理</li>
						<li><a href="admin_index.php?htid=13">回帖回收站</li>
					</ul>
					</div>
					<div class="left_bottom1">
						<p>
							Powered by
							<strong><a href='#'>phpxy</a></strong>
							<em>V2</em>
						</p>
						<p>
							&copy;2017 <a href='#'>phpxy Inc</a>
						</p>
					</div>
				</div>
				<!--left end--->
				
				<!--right start-->
					
				<div id="right">
					<div class="right_one">
						<h3>帖子管理</h3>
					</div>
					<div class="pmg">
						<div class="zhutinum">主题数:<em><?=$hshTSum;?></em></div>
					</div>
					<div class="zenmele">
						<div class="zen1">回复内容</div>
						<div class="zen2">板块</div>
						<div class="zen3">作者</div>
						
					</div>
					<form action="admin_index_update_huitie3.php" method="post">
					<?php if ($postdataC): ?>
					<?php foreach ($postdataC as $value):?>
						<?php if ( $value['isdelete'] == 1 && $value['rid'] != 0): ?>
					<div class="bb">
							<div class="bb1"><input type="checkbox" name="id[]" value="<?=$value['8'];?>"/></div>
							<div class="bb2"><?=$value['content'];?></div>
							<div class="bb3"><?=$value['0'];?></div>
							<div class="bb4"><p class="pa"><?=$value['name'];?></p><p class="pb"><?= date('Y-m-d H:i:s',($value['createtime']));?></p></div>
							<input type="hidden" name="isdelete[]" value="<?=$value['isdelete'];?>"/>
					</div>
						<?php endif; ?>
					<?php endforeach;?>
					<?php endif; ?>
					<div class="haha">
							<div class="haha1"><input type="submit" name="shanchuht" value="删除主题"/></div>
							<div class="haha2"><input type="submit" name="huifuht" value="恢复主题"/></div>
					</div>
						<div class="fenye">
							<a href="admin_index.php?htid=13&pageD=1">首页</a>
							<a href="admin_index.php?htid=13&pageD=<?=$prevD;?>">上一页</a>
							<a href="admin_index.php?htid=13&pageD=<?=$nextD;?>">下一页</a>
							<a href="admin_index.php?htid=13&pageD=<?=$pageDCount;?>">尾页</a>	
					</div> 
					</form>
				</div>
				<!--right end-->
			</div>
</body>
</html>