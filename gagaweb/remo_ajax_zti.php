<?php
/**
*	删除专题
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-19
**/
// 开启session
session_start();
define("IN_TG",true);
header("Content-Type:text/html;charset=utf-8");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
//判断是否是超级管理员登录
manage_fn();
// 添加相册
if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
	// 判断唯一标识符是否正确
	_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
	
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean = array();
	$clean["id"] = $_POST["id"];
	$clean = html_fn($clean);
	
	// 判断专题下面是否有数据
	$numx =  num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_dir WHERE gaga_zhuti='{$clean["id"]}' LIMIT 1"));
	if($numx){
			echo "{ \"adds\":\""."0"."\"}";
			//关闭数据库
			close_sql();
		}else{
			mysqlquery_fn("DELETE FROM gaga_zhuti WHERE gaga_id='{$clean["id"]}' LIMIT 1 ");
			//关闭数据库
			close_sql();
			echo "{ \"adds\":\""."1"."\"}";
		}
}else{
	// 返回json
	echo "{ \"adds\":\""."0"."\"}";
}
?>