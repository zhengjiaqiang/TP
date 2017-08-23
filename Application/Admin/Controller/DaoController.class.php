<?php
namespace Admin\Controller;
use Think\Controller;
class DaoController extends Controller 
{
public function show()
{
	$this->display();
}
//导出Excel
public function excel() 
{
include 'PHPExcel/Classes/PHPExcel.php';
//创建对象 
$excel = new \PHPExcel(); 
//Excel表格式,这里简略写了8列 
$letter = array('A', 'B', 'C', 'D', 'E', 'F', 'F', 'G'); //表头数组 
$tableheader = array('ID', '姓名', '性别','年龄'); 
//填充表头信息
for ($i = 0; $i < count($tableheader); $i++) 
{
$excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
} 

//在这里调用你要导出的数据
$MsgModel = M("msg"); 
// 实例化Msg对象 
$list = $MsgModel->select(); //表格数组 
$data = $list; 
//填充表格信息 
for ($i = 2; $i <= count($data) + 1; $i++) 
{

$j = 0;
foreach ($data[$i - 2] as $key => $value)
{
$excel->getActiveSheet()->setCellValue("$letter[$j]$i", "$value"); $j++; 
} 
} 
//创建Excel输入对象 
$write = new \PHPExcel_Writer_Excel5($excel); 
header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download"); 
header("Content-Type:application/vnd.ms-execl"); 
header("Content-Type:application/octet-stream");
header("Content-Type:application/download"); 
header('Content-Disposition:attachment;filename="testdata.xls"'); 
header("Content-Transfer-Encoding:binary");
$write->save('php://output'); 
}
}