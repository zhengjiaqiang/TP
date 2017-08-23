<?php
namespace Admin\Controller;
use Think\Controller;
class DakaController extends Controller 
{
    public function index()
    { 
    	if(!empty($_POST))
    	{
        $data=I("post.");
        $data['am_time']=time();
        $data['pm_time']=time();
        $data['status']=0;
        print_r($data);
        $model=M("daka");
        $res=$model->add($data);
        if($res)
        {
        	$this->success("添加成功",U("Daka/show"));
        }
        else
        {
        $this->error("添加失败");	
        }
    	}
    	else
    	{
    	$this->display();	
    	}
        
    }
    public function show()
    {
    	$model=M("daka");
    	$list=$model->select();
    	$this->assign('list',$list);
    	$this->display();
    }
     public function sel()
    { 

        $yname=I("post.yname");
        $model=M("daka");
        $row=$model->where(['yname'=>$yname])->select();
        $this->assign('row',$row);
        $this->display();
    }
}