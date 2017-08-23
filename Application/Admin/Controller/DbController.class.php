<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Database;
use Org\Util\Page;
class DbController extends Controller 
{  
	/* 备份数据库*/
	 public function backups()
    {

	//------1. 数据库备份（导出）------------------------------------------------------------  
	//分别是主机，用户名，密码，数据库名，数据库编码  
	$db = new Database ( 'localhost', 'root', 'root','student', 'utf8' ); 
	// 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)  
	$db->backup('ge',"backup/",2000);  
	// ------2. 数据库恢复（导入）------------------------------------------------------------  
	//参数：sql文件  
	//$db->restore ( 'backup/20120914122939_all_v1.sql');
    }
    /* 还原数据库*/
	 public function recovers()
    {

	//------1. 数据库备份（导出）------------------------------------------------------------  
	//分别是主机，用户名，密码，数据库名，数据库编码  
	$db = new Database ( 'localhost', 'root', 'root','student', 'utf8' );  
	// ------2. 数据库恢复（导入）------------------------------------------------------------  
	//参数：sql文件  
	$db->restore ( 'backup/20170803163320_ge_v1.sql');
    }
}	