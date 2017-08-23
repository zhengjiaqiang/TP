<?php 
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class Demo4Controller extends Controller
{
	//列表展示
	public function show()
	{
	$wellcome=L("_WELLCOME_");
	$param=I("get.");
	$title=$param['news_name'];//接收传过来的值
	$red="<font color='red'>".$title."</font>";
	$arr=array("1=1");//定义一个恒成立的条件
	if(!empty($param['news_name']))
	{
		$arr[]="title like '%$title%'";
	}
	$_where=implode(' AND ', $arr);
    $model=M("xinwen");
    $count=$model->where($_where)->count();//数据总条数
    $p=new Page($count,2);
    $show= $p->show();// 分页显示输出
    $list=$model->where($_where)->order("click_num desc ")->limit($p->firstRow.','.$p->listRows)->select();
    $max=$model->max("click_num");//获取点击次数最大值
    //搜索后关键字标红
    foreach ($list as $k => $v)
    {
       if($v['click_num']==$max)
       {
       	file_put_contents("./first.txt", $max);
       }
    	$list[$k]['title']=str_replace($title, $red, $list[$k]['title']);
    }
    $this->assign('wellcome',$wellcome);
    $this->assign("list",$list);
    $this->assign("show",$show);
    $this->display();
	}
	//点击次数
	public function counts()
	{
		$id=I("get.id");//接收传过来的ID值
		$model=M("xinwen");
		$model->where(['id'=>$id])->setInc("click_num");//点击次数加1
		$row=$model->where(['id'=>$id])->find();
		$this->assign('row',$row);
		$this->display();

	}
}

 ?>