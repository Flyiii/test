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
						<div class="zhutinum">主题数:<em><?=$hTSum;?></em></div>
					</div>
					<div class="zenmele">
						<div class="zen1">回复内容</div>
						<div class="zen2">板块</div>
						<div class="zen3">作者</div>
						<div class="zen4">回复时间</div>
					</div>
					<form action="admin_index_update_huifu3.php" method="post">
							<?php if ($postdataB): ?>
							<?php foreach ($postdataB as $value):?>
							<?php if ($value['rid'] != 0 && $value['isdelete'] == 0): ?> 
					 <div class="liebiao"> 
						 <div class="lie1"><input type="checkbox" name="id[]" value="<?=$value['8'];?>"/></div>						
						 <div class="lie2"><?=$value['content'];?></div>						 
						 <div class="lie3"><?=$value['0'];?></div> 
						 <div class="lie4"><?=$value['name'];?></div> 
						 <div class="lie5"><?= date('Y-m-d H:i:s',($value['createtime']));?></div>
						 <input type="hidden" name="isdelete[]" value="<?=$value['isdelete'];?>"/>						 
					 </div> 
							 <?php endif; ?> 
							<?php endforeach;?>
							<?php endif; ?>
					<div class="huishou">
						<input type="submit" name="huishouhuitie" value="放入回收站"/>
					</div>
					<div class="fenye">
							<a href="admin_index.php?htid=12&pageC=1">首页</a>
							<a href="admin_index.php?htid=12&pageC=<?=$prevC;?>">上一页</a>
							<a href="admin_index.php?htid=12&pageC=<?=$nextC;?>">下一页</a>
							<a href="admin_index.php?htid=12&pageC=<?=$pageCCount;?>">尾页</a>	
					</div>   
					</form>
				</div>
				<!--right end-->
			</div>
</body>
</html>