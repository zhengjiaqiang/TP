<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
	public function __construct()
	{
		//重写父类中的方法
		parent::__construct();
	 $username=session('username');
     if(empty($username))
     {
     	$this->error("请先登录",U('login/login'));
     }
    
	}
}