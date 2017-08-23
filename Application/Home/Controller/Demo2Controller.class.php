<?php 
namespace Home\Controller;
use Think\Controller;
use Org\Util\Page;
class Demo2Controller extends Controller
{
	//列表展示
	public function show($display=true)
	{   
		$wellcome = L('_WELLCOME_');
		$_where=$this->search();
		$model=M('goods');
		$count=$model->where($_where)->count();//总条数
		$p=new Page($count);
		$pages=$p->getPage();
		$list=$model->where($_where)->order("click_num desc ")->limit($p->limit,$p->page_num)->select();
		if($display)
		{
		$this->assign('list',$list);
		$this->assign('pages',$pages);
		$this->assign('wellcome',$wellcome);
		$this->display();	
		}
		else
		{
        foreach ($list as $key => $value) 
        {
         	$param=I("get.");
			$goods_name=$param['goods_name'];//名称
			$goods_color=$param['goods_color'];
        	$red="<font color='red'>".$goods_name."</font>";
        	$list[$key]['goods_name']=str_replace($goods_name, $red, $list[$key]['goods_name']);
        }
		$this->assign('list',$list);
		$this->assign('pages',$pages);
		$this->assign('wellcome',$wellcome);
		}
		
	}
	//fenye
	public function show_table()
	{   
		
		$a=$this->show(false);
		$this->display();
	}
	//搜索条件
	public function search()
	{
	$arr=array("1=1");
	$param=I("get.");
	$goods_name=$param['goods_name'];//名称
	$goods_color=$param['goods_color'];
	if(!empty($goods_name))
	{
		$arr[]="goods_name like '%$goods_name%'";
	}	
	if(!empty($goods_color))
	{
		$arr[]="goods_color like '%$goods_color%'";
	}
	$_where=implode(' AND ', $arr);
	return $_where;
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