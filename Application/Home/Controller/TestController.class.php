<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\Inter;
class TestController extends Controller
{
    public function index()
    {    
        echo 1;die;
       $page=isset($_GET['page'])?$_GET['page']:1;
        $page_num=5;//每页显示的条数
    	$url='http://www.zen.com/inter.php';
    	$inter=new Inter();
    	 $data=array(
           "token"=>"cfcd208495d565ef66e7dff9f98764da",
           "tel"=>"13131218880",
           "type"=>"get",
           "channel"=>"1",
           " managerInvCode "=>"888888"
    	 	);
         $html=$inter->curlRequest($url,$data,true);
          print_r($html);
		  $post_data=array(
    "token"=>"cfcd208495d565ef66e7dff9f98764da",
		'page'=>$page,
		'page_num'=>$page_num,
		'sign'=>md5('1504_c'.$time.$rand),
		'type'=>'set',
			);
$res=$inter->curlRequest($url,$post_data,true);
        print_r($res);
    }
}
