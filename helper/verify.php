<?php

/* 
	功能，
	参数，
	返回值
 */

function verify($width = 200,$height = 50,$len = 4, $type = 3)
{
	//1.创建画布
	$img = imagecreatetruecolor($width,$height);
	//2.创建相关颜色
	$light = lightColor($img);
	$dark = darkColor($img);
	//3.设置浅色的背景
	imagefill($img, 0,0, $light);
	//4.产生随机验证码的字符
	$code = randString($len,$type);
	
	//5.将验证码逐一的画到画布上面,一个字符一个字符的画
	//求每个字的宽度
	$perWidth = $width / $len;  //默认的算出来就是50
	$fontSize = floor($height / 3);
	for ($i = 0; $i < $len; $i++) {
		//专门处理一下汉字
		$offsetX = $i * $perWidth + $perWidth / 3;
		if ($type == 3) {
			$offsetY = mt_rand($fontSize + 5,$height - 5);
			$hanzi = mb_substr($code,$i,1);
			$angle = mt_rand(-30,30);
			imagettftext($img,$fontSize,$angle,$offsetX,$offsetY,$dark,'xdxwz.ttf',$hanzi);
		} else {
			$offsetY = mt_rand(0,$height - 25);
			imagechar($img,5,$offsetX,$offsetY,$code[$i],$dark);
		}
		
		
	}
	
	
	//6.添加干扰元素(点，线)
	for ($i = 0; $i < $width * $height / 20; $i++) {
		$x = mt_rand(0,$width);
		$y = mt_rand(0,$height);
		$color = darkColor($img);
		imagesetpixel($img, $x,$y, $color);
	}
	//7.发送header
	header('Content-Type:image/png');
	//8.发送图片
	imagepng($img);
	
	//9.释放资源
	imagedestroy($img);
	return $code;
}

function lightColor($img)
{
	return imagecolorallocate($img,mt_rand(128,255),mt_rand(128,255),mt_rand(128,255));
}
function darkColor($img)
{
	return imagecolorallocate($img,mt_rand(0,127),mt_rand(0,127),mt_rand(0,127));
}

function randString($len,$type)
{
	switch ($type) {
		case 0://纯数zi
			return randNumber($len);
			
		case 1://字母zi
			return randAlpha($len);
			
		case 2://数字字母组合zi
			return randMixed($len);
			
		case 3://汉字
			return randChinese($len);
			
	}
}
//1.随机产生几个数字

function randNumber($len)
{
	/* $str = '1345687290';
	return substr(str_shuffle($str),0,$len); */
	//思路很重要，取决你的对函数的一个掌握
	$arr = range('0','9');
	shuffle($arr);
	$result = array_chunk($arr,$len);
	$result = $result[0];
	return  join('',$result);
	
}
//2.随机产生英文字母的字符串
function randAlpha($len)
{
	$arr1 = range('a','z');
	$arr2 = range('A','Z');
	$arr = array_merge($arr1,$arr2);
	shuffle($arr);
	$result = array_slice($arr,0,$len);
	return join('',$result);
	
}
//3.随机产生一个英文和数字组合的一个字符串
function randMixed($len)
{
	$str = '';
	for ($i = 0;$i < $len;$i++) {
		$type = rand(0,2);
		switch ($type) {
			case 0://数字
				$str .= chr(mt_rand(48,57));
				break;
			case 1://大写字母
				$str .= chr(mt_rand(65,90));
				break;
			case 2://小写
				$str .= chr(mt_rand(97,122));
				break;
			
			
		}
		
	}
	return $str;
}
//4.随机产生几个汉字
function randChinese($len)
{
	$str = '';
	for ($i = 0; $i < $len; $i++) {
		$c1 = mt_rand(176,214);
		$c2 = mt_rand(161,254);
		$str .= chr($c1) . chr($c2);
	}
	return iconv('gbk','utf-8',$str);
}











