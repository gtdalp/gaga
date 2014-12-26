<?php
/**
*	修改相册
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
// 修改相册
if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
	// 判断唯一标识符是否正确
	_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean11 = array();
	$clean11["id"] = $_POST["id"];
	$clean11["name"] = $_POST["title"];
	$clean11["zhuti_type"] = $_POST["zhuti"];
	$clean11["quanxian"] = $_POST["quanxian_se"];
	$clean11["pass"] = $_POST["photo_pass"];
	$clean11["content"] = $_POST["cont"];
	$clean11["quanx"] = $_POST["shi_ip"];
	$clean11 = html_fn($clean11);

	if($clean11["quanxian"]==0){
		$clean11["quanxian_se_h"] = "公开";
	}else{
		$clean11["quanxian_se_h"] = "私密";
	}
		
	// 新增数据
	// 把当前数据写入数据库
	if(empty($clean11["quanxian"])){//gaga_type_name
		mysqlquery_fn("UPDATE gaga_dir SET
		gaga_name='{$clean11["name"]}',gaga_type='{$clean11["quanxian"]}',gaga_password=NULL,
		gaga_zhuti='{$clean11["zhuti_type"]}',gaga_content='{$clean11["content"]}',
		gaga_qit='{$clean11["quanx"]}',gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
	}else{
		mysqlquery_fn("UPDATE gaga_dir SET
		gaga_name='{$clean11["name"]}',gaga_type='{$clean11["quanxian"]}',gaga_password='{$clean11["pass"]}',
		gaga_zhuti='{$clean11["zhuti_type"]}',gaga_content='{$clean11["content"]}',
		gaga_qit='{$clean11["quanx"]}',gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
	}
	if(affected_rows_fn($conn) == 1 ){      // 创建相册成功
		//关闭数据库
		close_sql();
		// 跳转到指定的页面
		//location_fn("post.php","恭喜你添加相册成功！");
	}else{
		//关闭数据库
		close_sql();
		// 跳转到指定的页面
		//location_fn("post.php","很遗憾，相册添加失败！");
	}
	// 返回json
	echo "{
				\"name\":\"".$clean11["name"]."\",
				\"quanxian\":\"".$clean11["quanxian_se_h"]."\"
			  }";
}
?>