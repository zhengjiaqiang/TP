<?php
/**
 * Created by PhpStorm.
 * User: DELL-
 * Date: 2017/5/25
 * Time: 9:02
 */
namespace home\Controller;
use Think\Controller;
use Org\Util\Inter;
// use Think\Image;
class Test2Controller extends Controller
{
 public function index()
 {
  $image = new \Think\Image(); 
  $image->open('./1.jpg');
  //将图片裁剪为400x400并保存为corp.jpg
  $image->crop(400, 400)->save('./crop.jpg');
  // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
  // $thumb=$image->thumb(150, 150)->save('./thumb.jpg');
  // 给裁剪后的图片添加图片水印（水印文件位于./logo.png），位置为右下角，保存为water.gif
  $image->water('./logo.png')->save("water.gif");
  // 在图片左上角添加水印（水印文件位于./logo.png） 并保存为water.jpg
  //$image->open('./1.jpg')->water('./logo.png',\Think\Image::IMAGE_WATER_NORTHWEST)->save("water.jpg"); 
  //print_r($thumb);
 }
}