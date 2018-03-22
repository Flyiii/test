<?php


//退出

include './common/home.php';

	setcookie('id','',time()-1);
	setcookie('name','',time()-1);
	setcookie('pwd','',time()-1);
	setcookie('email','',time()-1);
	
	
	setcookie('level','',time()-1);
	setcookie('icon','',time()-1);
	setcookie('gold','',time()-1);
  header('location:index.php');
