<?php
//浏览器访问站点的根目录
define('WEB_SITE','http://www.wocao.com/');
//本地磁盘文档的根目录
define('DOC_ROOT',str_replace('\\','/',dirname(__DIR__)) . '/');
//样式表的目录

define('CSS_PATH',WEB_SITE . 'public/css/');

//图片库的目录
define('IMG_PATH',WEB_SITE . 'public/img/');

//字体库的目录
define('TIF_PATH',DOC_ROOT . 'public/fonts/');