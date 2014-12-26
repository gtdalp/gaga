<?php
/**
*	修改照片名称
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-17
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
	
	$do = html_fn($_POST["do"]);
	if($do=='getinfo'){
		getinfo_fn();
	}
	if($do=='getinfo1'){
		getinfo_fn1();
	}
	// 确定修改
	if($do=='qdxiug'){
		getinfo_fn2();
	}
	//设置封面
	if($do == "getinfo3"){
		szfm_fn();
	}
	// 摄影日志分类修改获取数据
	if($do == "upde_leib"){
		upde_leib();
	}
	// 确定修改摄影日志分类
	if($do == "upde_leib_y"){
		upde_leib_y();
	}
}else{
	//
}
// 摄影日志分类修改获取数据
function upde_leib(){
	$result = mysqlquery_fn("SELECT gaga_name,gaga_content,gaga_show FROM gaga_syrz_lb WHERE gaga_id='{$_POST["id"]}' LIMIT 1");
	$row = mysql_fetch_array($result);
	
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean = array();
	$clean["name"] = $row["gaga_name"];
	$clean["content"] = $row["gaga_content"];
	$clean["show"] = $row["gaga_show"];
	mysqlquery_fn("UPDATE gaga_dir SET gaga_face='{$clean["url"]}',gaga_face1='{$clean["burl"]}' WHERE gaga_id='{$clean["sid"]}' LIMIT 1");
	
	echo "{
		\"name\":\"".$clean["name"]."\",
		\"content\":\"".$clean["content"]."\",
		\"show\":\"".$clean["show"]."\"
	}";
}
// 确定修改摄影日志分类
function upde_leib_y(){
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean11 = array();
	$clean11["id"] = $_POST["id"];
	$clean11["title"] = $_POST["title"];
	$clean11["content"] = $_POST["content"];
	$clean11["show"] = $_POST["show"];
	$clean11 = html_fn($clean11);
	// 更新数据	
	mysqlquery_fn("UPDATE gaga_syrz_lb SET
	gaga_name='{$clean11["title"]}',
	gaga_content='{$clean11["content"]}',
	gaga_show = '{$clean11["show"]}',
	gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
	
	global $conn;
	if(affected_rows_fn($conn) == 1 ){      // 修改成功
		// 返回json
		echo "{
			\"xgad\":\""."1"."\",
			\"id\":\"".$clean11["id"]."\"
		}";
		//关闭数据库
		close_sql();
	}else{
		// 返回json
		echo "{
			\"xgad\":\""."0"."\"
		}";
		//关闭数据库
		close_sql();
	}
	
	
	
	
	
}
// 设置封面
function szfm_fn(){
	$result = mysqlquery_fn("SELECT gaga_id,gaga_sid,gaga_url,gaga_burl  FROM gaga_photo WHERE gaga_id='{$_POST["id"]}' LIMIT 1");
	$row = mysql_fetch_array($result);
	
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean = array();
	$clean["sid"] = $row["gaga_sid"];
	$clean["url"] = $row["gaga_url"];
	$clean["burl"] = $row["gaga_burl"];
	mysqlquery_fn("UPDATE gaga_dir SET gaga_face='{$clean["url"]}',gaga_face1='{$clean["burl"]}' WHERE gaga_id='{$clean["sid"]}' LIMIT 1");
	
	global $conn;
	if(affected_rows_fn($conn) == 1 ){      // 修改成功
		// 返回json
		echo "{\"xgad\":\""."1"."\"}";
		//关闭数据库
		close_sql();
	}else{
		// 返回json
		echo "{\"xgad\":\""."0"."\"}";
		//关闭数据库
		close_sql();
	}
}
// 确定修改
function getinfo_fn2(){
	$result = mysqlquery_fn("SELECT gaga_id,gaga_zhuanti_id,gaga_sid,gaga_url,gaga_burl FROM gaga_photo WHERE gaga_id='{$_POST["id"]}' LIMIT 1");
	$row = mysql_fetch_array($result);
	
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean11 = array();
	$clean11["id"] = $_POST["id"];
	$clean11["name"] = $_POST["title"];
	$clean11["zhuanti_id"] = $_POST["zhuti"];
	$clean11["content"] = $_POST["content"];
	$clean11["xiangc"] = $_POST["xiangc"];
	
	$clean11["gaga_zhuanti_id"] = $row["gaga_zhuanti_id"];
	$clean11["gaga_sid"] = $row["gaga_sid"];
	$clean11["gaga_url"] = $row["gaga_url"];
	$clean11["gaga_burl"] = $row["gaga_burl"];
	$clean11 = html_fn($clean11);
	
	
	// 查找修改到那个相册
	if(!!$row2 = mysql_fetch_array(mysqlquery_fn("SELECT gaga_id,gaga_dir,gaga_face,gaga_face1 FROM gaga_dir WHERE gaga_id='{$clean11["xiangc"]}' LIMIT 1"))){
		// 创建一个空数组，用来存放提交过来的合法数据
		$clean21 = array();
		$clean21["dirid"] = $row2["gaga_id"];
		$clean21["dir"] = $row2["gaga_dir"];
		$clean21["gaga_face"] = $row2["gaga_face"];
		$clean21["gaga_face1"] = $row2["gaga_face1"];
		$clean21 = html_fn($clean21);
	}else{
		alert_back("不存在此相册!");
	}
	// 判断是否改变了专题
	if($clean11["zhuanti_id"] == $clean11["gaga_zhuanti_id"]){  // 没有改变专题
		if($clean11["xiangc"] != $clean11["gaga_sid"] ){   // 相册改变
			mysqlquery_fn("UPDATE gaga_photo SET
			gaga_name='{$clean11["name"]}',
			gaga_content='{$clean11["content"]}',
			gaga_sid = '{$clean11["xiangc"]}',
			gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
		}else{// 相册没有改变
			mysqlquery_fn("UPDATE gaga_photo SET
			gaga_name='{$clean11["name"]}',
			gaga_content='{$clean11["content"]}',
			gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
		}
	}else{
		
		/*
		// 判断图片封面是否为空白
		if(!!$rowsxx = fetch_array_fn("SELECT gaga_id,gaga_face,gaga_face1 FROM gaga_dir WHERE gaga_id='{$_GET["id"]}' LIMIT 1")){
			$htmlx = array();
			$htmlx["id"] = $rowsxx["gaga_id"];
			$htmlx["dir"] = $rowsxx["gaga_face"];
			$htmlx = html_fn($htmlx);
			if(!$htmlx["dir"]){
				mysqlquery_fn("UPDATE gaga_dir SET gaga_face = '{$smpng}',gaga_face1 = '{$bigpng}' WHERE gaga_id ='{$_GET["id"]}' LIMIT 1");
			}
		}else{
			alert_back("不存在此相册!");
		}
		
		*/
		mysqlquery_fn("UPDATE gaga_photo SET
		gaga_name='{$clean11["name"]}',
		gaga_zhuanti_id='{$clean11["zhuanti_id"]}',
		gaga_content='{$clean11["content"]}',
		gaga_sid = '{$clean11["xiangc"]}',
		gaga_last_time=NOW() WHERE gaga_id='{$clean11["id"]}' LIMIT 1");
	}
	
	global $conn;
	if(affected_rows_fn($conn) == 1 ){      // 修改成功
		// 返回json
		echo "{
			\"xgad\":\""."1"."\",
			\"dirid\":\"".$clean21["dirid"]."\",
			\"name\":\"".$clean11["name"]."\",
			\"content\":\"".$clean11["content"]."\",
			\"zhuti\":\"".$clean11["zhuanti_id"]."\",
			\"dir\":\"".$clean21["dir"]."\"
		}";
		//关闭数据库
		close_sql();
	}else{
		// 返回json
		echo "{
			\"xgad\":\""."0"."\"
		}";
		//关闭数据库
		close_sql();
	}
	
}
function getinfo_fn1(){
	$result = mysqlquery_fn("SELECT gaga_id,gaga_name FROM gaga_dir WHERE gaga_zhuti='{$_POST["id"]}' ");
	while (!!$row = mysql_fetch_array($result)){
		$html = array();
		$html["id"] = $row["gaga_id"];
		$html["name"] = $row["gaga_name"];
		$html = html_fn($html);
		$ahtml .= '<option value="'.$html["id"].'">'.$html["name"].'</option>';
	}
	// 返回json
	echo $ahtml;
}
function getinfo_fn(){
	$result = mysqlquery_fn("SELECT gaga_id,gaga_zhuanti_id,gaga_name,gaga_zhuanti_id,gaga_content,gaga_sid FROM gaga_photo WHERE gaga_id='{$_POST["id"]}' ");
	$row = mysql_fetch_array($result);
	$html = array();
	$html["id"] = $_POST["id"];
	$html["name"] = $row["gaga_name"];
	$html["zhuti"] = $row["gaga_zhuanti_id"];
	$html["content"] = $row["gaga_content"];
	$html["sid"] = $row["gaga_sid"];
	$html = html_fn($html);
	// 返回json
	echo "{
				\"id\":\"".$html["id"]."\",
				\"name\":\"".$html["name"]."\",
				\"zhuti\":\"".$html["zhuti"]."\",
				\"content\":\"".$html["content"]."\",
				\"sid\":\"".$html["sid"]."\"
			  }";
}
?>