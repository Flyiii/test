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
						<div class="zhutinum">主题数:<em><?=$hstZSum;?></em></div>
					</div>
					<div class="zenmele">
						<div class="zen1">主题</div>
						<div class="zen5">板块</div>
						<div class="zen6">作者</div>
						<div class="zen7">回复/查看</div>
					</div>
					<form action="admin_index_huifu.php" method="post">
					<?php if ($postdataA): ?>
						<?php foreach ($postdataA as $value):?>
							<?php if ($value['isdelete'] == 1 && $value['rid'] == 0): ?>
						
						<div class="cc">
							<div class="cc1"><input type="checkbox" name="id[]" value="<?=$value['8'];?>"/></div>
							<div class="cc2"><?=$value['title'];?></div>
							<div class="cc3"><?=$value['0'];?></div>
							<div class="cc4"><p class="pa"><?=$value['name'];?></p><p class="pb"><?= date('Y-m-d H:i:s',($value['createtime']));?></p></div>
							<div class="cc5"><?=$value['replytotal'];?>/<?=$value['visittotal'];?></div>
							<input type="hidden" name="isdelete[]" value="<?=$value['isdelete'];?>"/>
						</div>
							<?php endif; ?>
						<?php endforeach;?>
						<?php endif; ?>
						<div class="haha">
							<div class="haha1"><input type="submit" name="shanchuzt" value="删除主题"/></div>
							<div class="haha2"><input type="submit" name="huifuzt" value="恢复主题"/></div>
						<div>
						<div class="fenye">
							<a href="admin_index.php?htid=11&pageB=1">首页</a>
							<a href="admin_index.php?htid=11&pageB=<?=$prevB;?>">上一页</a>
							<a href="admin_index.php?htid=11&pageB=<?=$nextB;?>">下一页</a>
							<a href="admin_index.php?htid=11&pageB=<?=$pageBCount;?>">尾页</a>	
					</div>   
					</form>
				<!--right end-->
			</div>
</body>
</html>