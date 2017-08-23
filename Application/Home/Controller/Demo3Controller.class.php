<?php 
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class Demo3Controller extends Controller
{
	//列表展示
	public function show()
	{   
        $param=I("get.");
   	    $arr=array("1=1");
   	    $goods_name=$param['goods_name'];
   	    $goods_color=$param['goods_color'];
   	    $red="<font color='red'>". $goods_name."</font>";
   	    if(!empty($param['goods_name']))
   	    {
   	    	$arr[]="goods_name like '%$goods_name%'";
   	    }
   	     if(!empty($param['goods_color']))
   	    {
   	    	$arr[]="goods_color like '%$goods_color%'";
   	    }
   	    $_where=implode(' AND ', $arr);
		$wellcome = L('_WELLCOME_');
		$model=M('goods');
		$count=$model->where($_where)->count();//总条数
		$p=new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $p->show();// 分页显示输出
		$list=$model->where($_where)->order("click_num desc ")->limit($p->firstRow.','.$p->listRows)->select();
		foreach ($list as $key => $value) 
		{
		 
		 $list[$key]['goods_name']=str_replace($goods_name, $red, $list[$key]['goods_name']);	
		}
	    $this->assign('list',$list);
	    $this->assign('wellcome',$wellcome);
	    $this->assign('show',$show);
	    $this->display();	
	}

	//点击次数
	public function counts()
	{
		$id=I("get.id");
		$model=M('goods');
		$model->where(['id'=>$id])->setInc('click_num');
		$row=$model->where(['id'=>$id])->find();
		$this->assign('row',$row);
		$this->display();

	}

}
 ?>