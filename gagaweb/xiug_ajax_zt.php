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
	
	$result = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content FROM gaga_zhuti  WHERE gaga_id='{$_POST["id"]}' LIMIT 1");
	$row = mysql_fetch_array($result);
	$html = array();
	$html["id"] = $row["id"];
	$html["name"] = $row["gaga_name"];
	$html["cont"] = $row["gaga_content"];
	$html = html_fn($html);
	
	if(affected_rows_fn($conn) == 1 ){
		echo "{
				\"adds\":\""."1"."\",
				\"name\":\"".$html["name"]."\",
				\"zhuti\":\"".$html["cont"]."\"
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