
			
			<!--left start-->
			<div id = "down">
				<div id = "left">
					<div class="left_ul">
					<ul>
						<li><a href="admin_index.php?htid=4">站点信息</li>
						<li><a href="admin_index.php?htid=5">友情链接</li>
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
						<h3>友情链接</h3>
					</div>
					
					<div class="close_Site">
						<p>技巧提示</p>
					</div>
					<div class="three">
						<ul>
							<li class="li_a">未填写文字说明的项目将以紧凑型显示。</li>
						</ul>
					</div>
					<div class="four">
						<div class="four_a">显示顺序</div>
						<div class="four_b">站点名称</div>
						<div class="four_c">站点 URL</div>
						<div class="four_d">文字说明(可选)</div>
						<div class="four_e">logo地址(可选)</div>
					</div>
					<form  action="admin_index_delete.php" method="post">
					 <?php foreach ($row as $value):?>   
					<div class="inp"> 
					
					  
						<input class="inp_1" type="checkbox" name="id[]" value="<?=$value['id'];?>"/>
						<input class="inp_2" type="text" name="orderby[]" value="<?=$value['orderby'];?>"/>
						<input class="inp_3" type="text" name="name[]" value="<?=$value['name'];?>"/>
						<input class="inp_4" type="text" name="url[]" value="<?=$value['url'];?>"/>
						<input class="inp_5" type="text" name="intro[]" value="<?=$value['intro'];?>"/>
						<input class="inp_6" type="text" name="icon[]" value="<?=$value['icon'];?>"/>
						<input class="inp_7" type="hidden" name="rid[]" value="<?=$value['id'];?>"/>
					
					
					
					</div>
					  <?php endforeach;?>   
					<div class="btt">
						<input class = "sc" type="submit" name="delete" value="删除"/>				
						<input class = "add" type="submit" name="change" value="修改"/>
					</div>
					</form >
					<div class="five">
						<div class="five_a">显示顺序</div>
						<div class="five_b">站点名称</div>
						<div class="five_c">站点 URL</div>
						<div class="five_d">文字说明(可选)</div>
						<div class="five_e">logo地址(可选)</div>
					</div>
					<div class="friendlink">
						<img src="http://localhost/mybbs/public/images/add.png"/>
						
					</div>
				
					<form  action="admin_index_insert.php" method="post">
					<div class="inp_add">
					
						
						<input class="inp2" type="text" name="orderby"/>
						<input class="inp3" type="text" name="name"/>
						<input class="inp4" type="text" name="url"/>
						<input class="inp5" type="text" name="intro"/>
						<input class="inp6" type="text" name="icon"/>
			
					<div class="bt_add">
					
						<input  type="submit" name="add" value="添加"/>
					
					</div>
					</form>
				</div>
				<!--right end-->
			 </div>
			 </div>
</body>
</html>