<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$title;?></title>
	<link rel="stylesheet" type="text/css" href="../public/css/base.css">
	<!--================================================================================-->
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script> 
</head>
<body>
	<!-- ======================发帖页面============================= -->
	<div class="fat">
		<div class="neihe_head clearFix">
			<ul>
				<li class="neihe_head_a"></li>
				<li class="neihe_head_b"></li>
				<li><a  class="neihe_head_c" href="index.php">论坛</a></li>
				
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="index.php?classid=<?=$bigId;?>"><?=$bigName;?></a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="neihe.php?classid=<?=$smallId;?>"><?=$smallName;?></a></li>
				<em>发表帖子</em>
			</ul>
		</div>
		<!-- ========================发帖 content====================== -->
		<div class="fat_content">
			<div class="fat_count_hd">
				<p class="fat_count_hd1">发表帖子</p>
			</div>
			<form action="ft.php" method="post">
				<div class="fat_title">
					<!-- <input class="fat_title_a" type="text" name="title" value=""> -->
					<span><input type="text" name="title" id="subject" class="px" onkeyup="showLength(this,'checklen',80);" style="width: 25em" tabindex="1" /></span>
					<span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span>
				</div>
				<script id="editor" type="text/plain" name="content" style="width:800px;height:200px;"></script>
				<div class="fat_soujia">
					<div class="fat_soujia_a">
						<span class="fat_soujia_aa"></span>
						<span>售价</span>
					</div>
					<div class="fat_soujia_b">
						售价：<input class="fat_soujia_bb" type="text" name="sj" value="" placeholder="0">
						<span>金钱</span>
						<span class="fat_max">(最高30)</span>
					</div>
				</div>
				<input type="hidden" id="classid" name="classid" value="<?=$classId;?>" />
				<div class="fat_sub">
					<input class="fat_sub_a" type="submit" name="sub" value="发表贴子">
				</div>
			</form>
			<script>
	
	var BROWSER = {};
	var USERAGENT = navigator.userAgent.toLowerCase();
	browserVersion({'ie':'msie','firefox':'','chrome':'','opera':'','safari':'','mozilla':'','webkit':'','maxthon':'','qq':'qqbrowser'});
	if(BROWSER.safari) {
		BROWSER.firefox = true;
	}
	BROWSER.opera = BROWSER.opera ? opera.version() : 0;

	function showLength(obj,checklen,maxlen){
	
		var v = obj.value, charlen = 0, maxlen = !maxlen ? 200 : maxlen, curlen = maxlen, len = strlen(v);
		for(var i = 0; i < v.length; i++) {
			if(v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
				curlen -= 2;
			}
		}
		if(curlen >= len) {
			document.getElementById("checklen").innerHTML = curlen - len;
		} else {
			obj.value = mb_cutstr(v, maxlen, true);
		}
	
	}
	
	function strlen(str) {
		return (BROWSER.ie && str.indexOf('\n') != -1) ? str.replace(/\r?\n/g, '_').length : str.length;
	}
	
	function mb_cutstr(str, maxlen, dot) {
		var len = 0;
		var ret = '';
		var dot = !dot ? '...' : '';
		maxlen = maxlen - dot.length;
		for(var i = 0; i < str.length; i++) {
			len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? 3 : 1;
			if(len > maxlen) {
				ret += dot;
				break;
			}
			ret += str.substr(i, 1);
		}
		return ret;
	}
	
	function extraCheck(len){
	
		strlen=document.getElementById('price').value.length;
		if(strlen>len){
			alert('最高 30');
			document.getElementById('price').value=0;
		}else{
		
			if(document.getElementById('price').value>30){
			
				alert('最高 30');
				document.getElementById('price').value=30;
			
			}
		
		}
	
	}
	</script>
		</div>
	</div>
</body>
</html>