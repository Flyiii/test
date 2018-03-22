<html>
<head>
	<meta charset="UTF-8">
	<title>内核源码-十分学院</title>
	<link rel="stylesheet" type="text/css" href="../public/css/base.css">
</head>
<body>
	<!-- 内核源码 -->
	<div class="neihe">
		<div class="neihe_head clearFix">
			<ul>
				<li class="neihe_head_a"></li>
				<li class="neihe_head_b"></li>
				<li><a  class="neihe_head_c" href="index.php">论坛</a></li>
				
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="index.php?bigid=<?=$bigId;?>"><?=$bigName;?></a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="neihe.php?classid=<?=$smallId;?>"><?=$smallName;?></a></li>
			</ul>
		</div>
		<div class="neihe_content">
			<!-- ==========================内核left======================= -->
			<div class="neihe_left">
				<div class="neihe_left_a">
					<p class="neihe_left_aa"><span>版块导航</span></p>
				</div>
				<?php foreach ($row2 as $value):?>
					<?php if ($value['sid'] == 0): ?>
				<div class="neihe_left_b">
					<span><!-- PHP技术交流 --><?=$value['name'];?></span>
				</div>
					<?php endif; ?>
					<?php $id=$value['id'];?>
					<?php foreach ($row2 as $value):?> 
					 <?php if ( $value['sid'] == $id ): ?> 
				<div class="neihe_left_c">
					<ul>
						<li class="neihe_left_li1"><a href="neihe.php?classid=<?=$value['id'];?>"><!-- 内核源码 --><?=$value['name'];?></a></li>
						<!-- <li class="neihe_left_li1"><a href="neihe.html">PHP框架</a></li> -->
					</ul>
				</div>
				<?php endif; ?>
				<?php endforeach;?>
				
				
			<?php endforeach;?> 
			</div>
			<!-- ==============================内核right============================= -->
			
			<div class="neihe_right">
				<div class="neihe_rt_hd">
				
					<div class="neihe_rt_hd1">
						<ul>
						
							<li><a class="neihe_rt_li1" href="neihe.php?classid=<?=$value['id'];?>"><?=$OnCname;?></a></li>
							
			
							<li class="neihe_rt_li2">今日：</li>
							<li><i  class="neihe_rt_li3"><?=$JCount;?></i></li>
							<li class="neihe_rt_li2">主题：</li>
							<li class="neihe_rt_li4"><?=$zCount;?></li>
						</ul>
					</div>
						
					<div class="neihe_rt_hd2">
						<span class="neihe_rt_bz">版主：</span>
						<span class="neihe_rt_te"><?=$compere;?></span>
					</div>
				</div>
				<div class="neihe_rt_sub clearFix">
				<!--=====================发帖=======================-->
					<a class="neihe_rt_ft" href="ft.php?classid=<?=$OnCid;?>"></a>
					<p class="neihe_rt_fh">
						<span class="neihe_rt_fha"></span>
						<a class="neihe_rt_fhb" href="index.php">返回</a>
					</p>
				</div>
				<div class="neihe_rt_box">
					<div class="neihe_rt_bhd">
						<ul>
							<li class="bhd_li1">筛选：</li>
							<li><a class="bhd_li2" href="neihe.php?classid=<?=$classId;?>">全部</a></li>
							<li><a class="bhd_li3" href="neihe.php?classid=<?=$classId;?>&iselite=1">精华</a></li>
							<li class="bhd_li4">作者</li>
							<li class="bhd_li5">回复/查看</li>
							<li class="bhd_li6">最后发表</li>
						</ul>
					</div>
					<div class="neihe_rt_content">
						<?php if (!empty($ListContent)): ?>
						
						<?php foreach ($ListContent as $value):?>
							
						<div class="neihe_rt_content1">
						
							<ul>
							
								<li><a href="detail.php?id=<?=$value['id'];?>"title="<!--<?php if ( $value['createtime']>$newt): ?>-->有新回复 - <!--<?php endif; ?>-->新窗口打开"target="_blank"><img class="neihe_content_li1" src="http://localhost/mybbs/public/img/images/folder_<?php if ( $value['createtime']>$newt): ?>new<?php else: ?>common<?php endif; ?>.gif"/></a></li>
								<li class="neihe_content_li2"><a href="detail.php?id=<?=$value['id'];?>"<?php if (!empty($value['style'])): ?>style="color:<?=$value['style'];?>"<?php endif; ?>><?=$value['title'];?></a><!--<?php if ($value['needgold']): ?>-->
							 - [售价 <span class="xw1"><?=$value['needgold'];?></span> 金钱]
							 <!--<?php endif; ?>-->
							 <!--<?php if ($value['iselite']): ?>-->
							 <img src="http://localhost/mybbs/public/img/images/digest_1.gif" align="absmiddle" alt="digest" title="精华帖" />
							 <!--<?php endif; ?>-->
							 <!--<?php if ( $value['createtime']>$newt): ?>-->
							 <a href="detail.php?id=<?=$value['id'];?>" class="xi1">New</a>
							 <!--<?php endif; ?>--></li>
								<li class="neihe_content_li3">
								<?php foreach ($row1 as $name):?>
									<?php if ($value['uid'] == $name['id']): ?>
									<p class="li3_1"><?= getUserName($value['uid']);?></p>
									<p class="li3_2"><?= date('Y-m-d H:i:s',($value['createtime']));?></p>
									<?php endif; ?>
								<?php endforeach;?>
								</li>
								<li class="neihe_content_li4">
									<p class="li4_1"><?=$value['replytotal'];?></p>
									<p class="li4_2"><?=$value['visittotal'];?></p>
								</li>
							   
								<li class="neihe_content_li5">
								
									<p class="li5_1"><?= getListUName($value['id']);?></p>
									<!-- <p class="li5_2"><?=$value['lastpost'];?></p> -->
								</li>
								
							</ul>
						</div>
						<?php endforeach;?>
						<?php endif; ?>
					</div>
				</div>
				<div class="neihe_rt_sub clearFix">
				<!--=====================发帖=======================-->
					<a class="neihe_rt_ft" href="ft.php?classid=<?=$OnCid;?>"></a>
					<p class="neihe_rt_fh">
						<span class="neihe_rt_fha"></span>
						<a class="neihe_rt_fhb" href="index.php">返回</a>
					</p>
				</div>
				<!-- <div class="neihe_fenye">
					<form action="" method="">
						<ul>
							<li><input class="neihe_fy_li1" type="text" name="id" value=""></li>
							<li><input class="neihe_fy_li2" type="submit" name="sub" value="GO"></li>
							<li class="neihe_fy_li3">1</li>
							<li><a class="neihe_fy_li3" href="">下一页</a></li>
							<li><a class="neihe_fy_li3" href="">尾页</a></li>
							<li class="neihe_fy_li3">共有</li>
							<li class="neihe_fy_li4">13</li>
							<li class="neihe_fy_li5">条记录</li>
							<li class="neihe_fy_li3">每页显示</li>
							<li class="neihe_fy_li4">10</li>
							<li class="neihe_fy_li5">条，本页</li>
							<li class="neihe_fy_li4">1</li>
							<li class="neihe_fy_li5">-</li>
							<li class="neihe_fy_li4">10</li>
							<li class="neihe_fy_li5">条</li>
							<li class="neihe_fy_li6">1</li>
							<li class="neihe_fy_li5">/</li>
							<li class="neihe_fy_li4">2</li>
							<li class="neihe_fy_li5">页</li>
						</ul>
					</form> -->
					<div class="pageggggg"><?= fpage($zCount,$linum,[8,3,4,5,6,7,0,1,2]);?></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>