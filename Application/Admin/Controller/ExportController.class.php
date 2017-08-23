<?php
namespace Admin\Controller;
use Think\Controller;
class ExportController extends Controller
{
/*导入Excel*/
public function upload() {

ini_set('memory_limit','1024M');

if (!empty($_FILES)) {

$config = array(

'exts' => array('xlsx','xls'),     // 设置附件上传类型

'maxSize' => 3145728000,          // 设置附件上传大小

'rootPath' =>"./Public/",         // 设置附件上传根目录

'savePath' => 'Uploads/',       //文件上传的保存路径（相对于根路径）

'subName' => array('date','Ymd'),  //子目录创建方式，采用数组或者字符串方式定义

);

$upload = new \Think\Upload($config);

if (!$info = $upload->upload())
{
// 上传错误提示错误信息
$this->error($upload->getError());
}
vendor("PHPExcel.PHPExcel");

$file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];

$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式

if ($extension == 'xlsx') {

$objReader =\PHPExcel_IOFactory::createReader('Excel2007');

$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

} else if ($extension == 'xls'){

$objReader =\PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

}

$sheet =$objPHPExcel->getSheet(0);// 获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推

$highestRow = $sheet->getHighestRow();//取得总行数
$highestColumn =$sheet->getHighestColumn(); //取得总列数
for ($i = 2; $i <= $highestRow; $i++) {

//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置

$data['a'] =$objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();

$data['b'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();

$data['c'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();

$data['d'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();

$data['e'] =$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue();

$data['f'] =$objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();

$data['input_time'] = time();

$data['promotion_type'] = mt_rand(3, 5);

//看这里看这里,这个位置写数据库中的表名

M('exports')->add($data);

}

$this->success('导入成功!');

} else {


$this->display();
//$this->error("请选择上传的文件");
}

}
}