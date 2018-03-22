<?php
session_start();
include '../config/common.php';
include 'verify.php';

$_SESSION['yzm'] = verify(100,30,4,2);
