<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\PHPExcel;
class ArticleController extends Controller 
{
	/*文章添加*/
    public function insert()
    {

	if(empty($_POST))
	{
	$this->display();
	}
	else
	{

	$path=$this->upload();
	$data=I("post.");
	$data['add_time']=time();
	$data['thumb_img']=$path;//文件保存路径
	$model=M("article");
	$res=$model->add($data);
	if($res)
	{

	$this->success("添加成功",U('Article/index'));	
	}
	else
	{
	$this->error("添加失败");
	}

	}
    }
    /*文件上传*/
    public function upload()
    {    
    $upload = new \Think\Upload();// 实例化上传类   
    $upload->maxSize = 3145728 ;// 设置附件上传大小    
    $upload->exts= array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    $upload->savePath = '/Public/Uploads/'; // 设置附件上传目录    
    // 上传单个文件     
    $info= $upload->uploadOne($_FILES['thumb_img']);    
    if(!$info)
     {
     // 上传错误提示错误信息
     return $this->error($upload->getError());    
     }
     else
     {
     // 上传成功 获取上传文件信息 
     return $info['savepath'].$info['savename'];    
     }
     }
    /*文章列表展示*/
    public function index()
    {

    $keywords=I("post.keywords");
    $arr=array("1=1");//定一个恒成立的条件
    if(!empty($keywords))
    {
    	$arr[]="title like '%$keywords%'";
    }
    $_where=implode(" AND ", $arr);
	$model=M("article");
	$count=$model->where($_where)->count();//数据总条数
	$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(3)
	$show= $Page->show();// 分页显示输出
	$list=$model->where($_where)->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('list',$list);
	$this->assign('show',$show);
	$this->display();
    }
    /*删除操作*/
    public function delete()
    {

	$id=I("get.art_id");
	$model=M("article");
	$info=$model->where(['art_id'=>$id])->delete();
	if($info)
	{

	$this->success("删除成功",U('Article/index'));	
	}
	else
	{
	$this->error("删除失败");
	}
    }
    /*文章更新*/
    public function update()
    {

	if(!empty($_POST))
	{
	$art_id=I("post.art_id");
    $model=M("article");
	$data=I("post.");
	$title=$data['title'];
	$author=$data['author'];
	$bool=$model->where(['art_id'=>$art_id])->save($data);
	if($bool)
	{

	$this->success("更新成功",U('Article/index'));	
	}
	else
	{
	$this->error("更新失败");
	}

	}
	else
	{
	$id=I("get.art_id");
	$model=M("article");
    $row=$model->where(['art_id'=>$id])->find();
    $this->assign('row',$row);
    $this->display();
	}

	}
	
}
