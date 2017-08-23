<?php
namespace Home\Controller;
use Think\Controller;
class DemoController extends Controller {
	/*签到展示页面*/
	public function Index(){
		$data = M('feng')->where(' uid = 1')->select();
		// var_dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}

	public function Add(){
		$time=date('Y-m-d');
		$time=strtotime($time);
		$is=M('feng_a')->where(' uid = 1 and time ='.$time)->select();
		if(!$is)
		{ 
			$arr= array(
				'uid'=>'1',
				'time'=>$time,
				);
			M('feng_a')->add($arr);

			M('feng')->where(' uid = 1 ')->setInc('num');

			$as = M('feng_a')->where(' uid = 1 and time = '.($time-86400))->select();
			print_r($as);die;
			if($as){
				$data = M('feng')->where( 'uid = 1')->find();
				$lnum= $data['lnum'];
				M('feng')->where(' uid = 1 ')->setInc('lnum');
				M('feng')->where(' uid = 1 ')->setInc('fen',$lnum+1);
			}else{
				M('feng')->where(' uid = 1 ')->setInc('fen');
				$a['lnum']='1';
				M('feng')->where(' uid = 1 ')->save($a);
			}
			$reg = M('feng')->where(' uid = 1')->select();
			exit(json_encode($reg));
		}else{

			echo 2;
		}
	}
}
