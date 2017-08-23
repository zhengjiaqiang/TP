<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller 
{
	 /**
	  登录
	 */
    public function login()
    {
    if(empty($_POST))
    {
    $this->display();
    }
    else
    {
    $username=I("post.username");
    $pwd=I("post.pwd");
    $model=M("regist");
    //判断用户名密码是否为空
    if($username==''||$pwd=='')
    {
    $this->error('用户名或密码不能为空');
    return;
    }
    $res=$model->where(['username'=>$username])->find();
    if($res['username'])
    {
    if($res['pwd']==$pwd)
    {
    session('username','xue'); //设置session
    $this->success("登录成功,用户名与密码输入正确",U('admin/index'));	
    }
    else
    {
    $this->error("密码输入有误");
    }
    }
    else
    {
    echo $this->error("该用户名不存在,请注册",U('regist/index'));
    }

    }
    }
    //登出
    public function out()
    {
    session('username',null); // 删除name
    $this->success("退出成功",U('login/login'));	
    }
   /* 生成验证码 */  
   public function verify()
    {

    $config = [
    'fontSize'    =>    30,    // 验证码字体大小   
    'length'      =>    3,     // 验证码位数    
    'useNoise'    =>    false, // 关闭验证码杂点
    ];
    $Verify = new Verify($config);
    $Verify->entry();
    }

 /* 验证码校验 */ 
  public function check_verify($code, $id = '')
    {
    $verify = new Verify();
    $res = $verify->check($code, $id);
    $this->ajaxReturn($res, 'json');
    }
}