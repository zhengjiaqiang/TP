<?php
namespace Admin\Controller;
use Think\Controller;
class RegistController extends Controller
{
	//注册
	public function index()
	{
		if(empty($_POST))
		{
			$this->display();
		}
		else
		{
			$model=M("regist");
			$data=I("post.");
			$res=$model->add($data);
			if($res)
			{
			$this->success("注册成功",U('login/login'));	
			}
			else
			{
				$this->error("注册失败");
			}
		}
	}
}