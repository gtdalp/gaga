<?php
/**
*	liuyanOS 1.0
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-2-27
**/
header("Content-Type:text/html;charset=utf-8");// 开启session
session_start();
// 定义一个常量防止恶意调用
define("IN_TG",true);
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
// 退出 清除cookie
unsetcookies();
session_destroy();    // 清除session
?>