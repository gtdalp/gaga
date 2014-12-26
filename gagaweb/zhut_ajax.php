<?php
/**
*	判断专题名称是否湘潭
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-20
**/
// 开启session
session_start();
define("IN_TG",true);
header("Content-Type:text/html;charset=utf-8");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
//判断是否是超级管理员登录
manage_fn();
// 修改相册
if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
	// 判断唯一标识符是否正确
	_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean11 = array();
	$clean11["id"] = $_POST["id"];
	$clean11["name"] = $_POST["name"];
	$clean11 = html_fn($clean11);
	if($clean11["id"]){
		$ttoal = num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_zhuti WHERE gaga_id != '{$clean11["id"]}' AND gaga_name='{$clean11["name"]}'"));
	}else{
		$ttoal = num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_zhuti WHERE gaga_name='{$clean11["name"]}'"));
	}
	// 返回json
	echo "{ \"adds\":\"".$ttoal."\"  }";
	close_sql();
}
?>