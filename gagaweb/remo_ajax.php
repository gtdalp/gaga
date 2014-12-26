<?php
/**
*	删除相册
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-18
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
if(!!$_rows11 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
	// 判断唯一标识符是否正确
	_uniqid($_rows11["gaga_uniqid"],$_COOKIE["uniqid"]);
	// 删除目录
	if(!!$rowsd = fetch_array_fn("SELECT gaga_id,gaga_dir FROM gaga_dir WHERE gaga_id='{$_POST["id"]}' LIMIT 1 ")){
		
		$htmld = array();
		$htmld["id"] = $rowsd["gaga_id"];
		$aax = explode(" ",$rowsd["gaga_dir"]);
		$htmld["dir"] = $aax[1];
		$htmld = html_fn($htmld);
		
		if(file_exists($htmld["dir"])){
			// 删除目录
			if(remove_dir($htmld["dir"])){
				// 删除数据库照片信息
				mysqlquery_fn("DELETE FROM gaga_photo WHERE gaga_sid='{$htmld["id"]}' ");
				mysqlquery_fn("DELETE FROM gaga_dir WHERE gaga_id='{$htmld["id"]}' LIMIT 1 ");
				//关闭数据库
				close_sql();
				// 返回json
				echo "{ \"return_tf\":\""."1"."\" }";
			}else{
				// 返回json
				echo "{ \"return_tf\":\""."0"."\" }";
			}
		}else{
			// 返回json
			echo "{ \"return_tf\":\""."0"."\" }";
		}
	}else{
		// 返回json
			echo "{ \"return_tf\":\""."0"."\" }";
	}
}else{
	// 返回json
	echo "{ \"return_tf\":\""."0"."\" }";
}



?>