<?php
include './config/common.php';
//�����������������
include DOC_ROOT. 'helper/template.php';
include DOC_ROOT. 'config/home.php';
include DOC_ROOT. 'config/database.php';
include DOC_ROOT . 'helper/image.php';

include DOC_ROOT . 'helper/verify.php';

include DOC_ROOT . 'helper/upload.php';
include DOC_ROOT . 'helper/mysql.php';
include DOC_ROOT . 'helper/user.php';
include DOC_ROOT . 'helper/page.php';
include DOC_ROOT . 'helper/func.php';

//�������ݿ�
$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
if (!$link) {
	exit('���ݿ�����ʧ��');
}