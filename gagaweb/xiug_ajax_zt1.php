<?php
/**
*	修改专题
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
if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
	// 判断唯一标识符是否正确
	_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
	// 获取数据
	$htmlx = array();
	$htmlx["id"] = $_POST["id"];
	$htmlx["name"] = $_POST["title"];
	$htmlx["cont"] = $_POST["cont"];
	$htmlx = html_fn($htmlx);
	
	// 修改
	mysqlquery_fn("UPDATE gaga_zhuti SET gaga_name='{$htmlx["name"]}',gaga_content='{$htmlx["cont"]}',gaga_last_date=NOW() WHERE gaga_id='{$htmlx["id"]}' LIMIT 1");

	if(affected_rows_fn($conn) == 1 ){
		echo "{
				\"adds\":\""."1"."\",
				\"name\":\"".$htmlx["name"]."\"
			  }";
		//关闭数据库
		close_sql();
	}else{
		echo "{ \"adds\":\""."0"."\" }";
		//关闭数据库
		close_sql();
	}
}else{
	echo "{ \"adds\":\""."0"."\" }";
}
?>