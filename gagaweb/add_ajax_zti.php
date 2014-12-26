<?php
/**
*	添加专题
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-14
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
	$clean["name"] = $_POST["title"];
	$clean["cont"] = $_POST["cont"];
	$clean = html_fn($clean);
	// 新增数据
	// 把当前数据写入数据库
	mysqlquery_fn("INSERT INTO gaga_zhuti (gaga_name,gaga_content,gaga_date) VALUES ('{$clean["name"]}','{$clean["cont"]}',NOW())");
	
	if(affected_rows_fn($conn) == 1 ){      // 添加专题成功
		$rows = fetch_array_fn("SELECT gaga_name,gaga_id FROM gaga_zhuti WHERE gaga_name='{$clean["name"]}' LIMIT 1");
		$clean1 = array();
		$clean1["id"] = $rows["gaga_id"];
		$clean1 = html_fn($clean1);
		// 返回json
		echo "{ \"adds\":\""."1"."\",\"id\":\"".$clean1["id"]."\"}";
		//关闭数据库
		close_sql();
	}else{
		//关闭数据库
		close_sql();
		// 返回json
		echo "{ \"adds\":\""."0"."\"}";
	}
}else{
	// 返回json
	echo "{ \"adds\":\""."0"."\"}";
}
?>