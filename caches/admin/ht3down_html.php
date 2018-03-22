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
						<li><a href="admin_index.php?htid=8">管理板块</li>
						<li><a href="admin_index.php?htid=9">添加板块</li>
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
						<h3>版块管理</h3>
					</div>
					<div class="num_order">
						<div class="tishi">显示顺序</div>
						<div class="tishi1">板块名称</div>
						<div class="tishi2">版主</div>
					</div>
					<form action="admin_index_update2.php" method="post">
					 <?php foreach ($row2 as $value):?>  
					 <?php if (($value['sid'] == 0)): ?> 
					<div class="hehe">
						
						<div class="lei"><input type="text" name="orderby[]" value="<?=$value['orderby'];?>"/></div>
						<div class="bulei"><input type="text" name="name[]" value="<?=$value['name'];?>"/></div>
					    <input type="hidden" name="sid[]" value="<?=$value['sid'];?>"/> 
						<input type="hidden" name="id[]" value="<?=$value['id'];?>"/>
						<input type="hidden" name="masters[]" value="<?=$value['masters'];?>"/>
						
					
					</div>
					
					
					<?php foreach ($row2 as $val):?>  
					 <?php if ( $value['id'] == $val['sid'] ): ?>
					<div class="hehe1">
						<div class="kkk"><input type="checkbox" name="rid[]" value="<?=$val['id'];?>"></div>
						 <div class="nan"><input type="text" name="orderby[]" value="<?=$val['orderby'];?>"/></div>
						
						<img src="http://localhost/mybbs/public/images/leibulei.png"/>
						 <div class="ren"><input type="text" name="name[]" value="<?=$val['name'];?>"/></div> 
						
						<div class="nana"><input type="text" name="masters[]" value="<?=$val['masters'];?>"/></div>	
						 <input type="hidden" name="rsid[]" value="<?=$val['sid'];?>"/> 
						 <input type="hidden" name="id[]" value="<?=$val['id'];?>"/> 
						
					</div>
					<?php endif; ?> 
					 
					 <?php endforeach;?> 
					 <?php endif; ?>
					  <?php endforeach;?> 
					 <div class="hehe2">
						<input type="submit" name="bkbt" value="提交"/>
						<input type="submit" name="ssssde" value="删除"/>
					 </div>
					 
					  	
					</form>
				</div>
				<!--right end-->
				
			</div>
</body>
</html>