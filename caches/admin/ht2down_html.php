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
						<li><a href="admin_index.php?htid=6">编辑用户</li>
						<li><a href="admin_index.php?htid=7">禁止ip</li>
					</ul>
					</div>
					<div class="left_bottom">
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
						<h3>用户管理</h3>
					</div>
					
					<div class="close_Site">
						<p>共有<em><?=$userSum;?></em>条用户记录</p>
					</div>
					<div class="usermg">
						<div class="usermg_a">用户名</div>
						<div class="usermg_b">积分</div>
						<div class="usermg_c">注册时间</div>
						<div class="usermg_d">用户类型</div>
					</div>
					
					<form action="admin_index_delete2.php"method="post">
					<!--  <?php foreach ($row1 as $value):?>   -->
						<div class="usermg_1">
						
							<div class="usermg_2"><input type="checkbox" name="id[]" value="<?=$value['id'];?>"/></div>
							
							<div class="usermg_3"> <?=$value['name'];?> </div>
							<div class="usermg_4"> <?=$value['gold'];?></div>
							<div class="usermg_5"><?=$value['regtime'];?> </div>
							<input type="hidden" name="islock" value="<?=$value['islock'];?>"/>
							<?php if ($value['level'] == 0): ?>
							<div class="usermg_6">普通用户</div>
							<?php else: ?>
							<div class="usermg_6">管理员</div>
							<?php endif; ?>
							<div class="usermg_7">
								<a href="#">积分</a>
								<a href="#">详情</a>
								<?php if ($value['islock'] < 5): ?>
								<a href="admin_index_islock.php?id[]=<?=$value['id'];?>">锁定用户</a>	
								
								<?php endif; ?>
								<?php if ($value['islock'] >= 5): ?>
								
								<a href="admin_index_islock1.php?id[]=<?=$value['id'];?>">解锁</a>
								<?php endif; ?>
							</div>							
											
						</div>
				<!--  <?php endforeach;?>  --> 
							<div class="btdelete">
								<input type="submit" name="btdelete" value="删除"/>
							</div>	
							<div class="fenye">
								<a href="admin_index.php?htid=1&page=1">首页</a>
								<a href="admin_index.php?htid=1&page=<?=$prev;?>" >上一页</a>
								<a href="admin_index.php?htid=1&page=<?=$next;?>" >下一页</a>
								<a href="admin_index.php?htid=1&page=<?=$pageCount;?>" >尾页</a>
							</div>	 	 				
				<!--right end-->							
						</form>	
							
			 </div>
			 </div>
</body>
</html>