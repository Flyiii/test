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
						<div class="zhutinum">主题数:<em><?=$tZCount[0][0];?></em></div>
					</div>
					<div class="biao">
						<div class="biao1">标题</div>
						<div class="biao2">板块</div>
						<div class="biao3">作者</div>
						<div class="biao4">回复</div>
						<div class="biao5">浏览</div>
						<div class="biao6">最后发表</div>
					</div>
					<form action="admin_index_update3.php" method="post">
					
						<?php if ($postdata): ?>
						<?php foreach ($postdata as $value):?>
						 <?php if ($value['rid'] == 0 && $value['isdelete'] == 0): ?>
					<div class="chu">
						<div class = "chulai"><input type="checkbox" name="id[]" value="<?=$value['8'];?>"/></div>
						<div class="chu1"><?=$value['title'];?></div>
						<div class="chu2"><?=$value['0'];?></div>						
						<div class="chu3"><?=$value['name'];?></div>						
						<div class="chu4"><?=$value['replytotal'];?></div>
						<div class="chu5"><?=$value['visittotal'];?></div>
						<div class="chu6"><?= date('Y-m-d H:i:s',($value['createtime']));?></div>						
						<input type="hidden" name="isdelete[]" value="$value['isdelete']"/>
					</div>
						<?php endif; ?>
					<?php endforeach;?> 
						<?php endif; ?>
					
					<div class="huishou">
						<input type="submit" name="shuishoutiezi" value="放入回收站"/>
					</div>
					 <div class="fenye">
							<a href="admin_index.php?htid=10&pageA=1">首页</a>
							<a href="admin_index.php?htid=10&pageA=<?=$prevA;?>">上一页</a>
							<a href="admin_index.php?htid=10&pageA=<?=$nextA;?>">下一页</a>
							<a href="admin_index.php?htid=10&pageA=<?=$pageACount;?>">尾页</a>	
					</div>   
					</form>
				</div>
				<!--right end-->
			</div>
</body>
</html>