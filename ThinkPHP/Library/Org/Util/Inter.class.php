<?php 
namespace Org\Util;
class Inter 
{
	//封装打印方法
public function p($arr)
{   echo "<pre/>";
	print_r($arr);
}
//curl采集
public function curlRequest($url,$post_data=array(),$is_post=false)
 {   
 	//var_dump($is_post);die;
 	 //如果传过来的地址或数据为空则终止程序
 	 if(empty($url)||empty($post_data))
 	 {
 	 	return false;
 	 }
 	  $data=array();//定义一个空数组
 	 foreach ($post_data as $key => $value)
 	  {
 	      $data[]="$key=".urlencode($value);
 	 }
 	  $new_data=implode('&', $data);
 	   // echo $new_data;
 	  //GET传值
 	  if(!$is_post)
 	  {
 	  	$url=$url.'?'.$new_data;
 	  }
 	//初始化
 $ch = curl_init();
 //设置选项，包括URL
 curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
 curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
 //POST提交
if($is_post)
 {
 curl_setopt($ch,CURLOPT_POST,1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,$new_data);
 }
 //执行并获取HTML文档内容
 $content = curl_exec($ch);
 //释放curl句柄
 curl_close($ch);
 //打印获得的数据
 //print_r($content);
 return $content;

 }
}

 ?>