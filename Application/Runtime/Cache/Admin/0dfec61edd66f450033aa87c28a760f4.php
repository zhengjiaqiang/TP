<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="/Public/Admin/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/index.php/Admin/Login/login" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username"  id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd"  id="pwd" size="40" class="admin_input_style" />
                    </li>
                     <div class=""> 
                    <label for="j_verify" class="t">验证码：</label> 
                    <input id="j_verify"  name="j_verify" type="text" class="admin_input_style"> 
                    <img id="verify_img" alt="点击更换" title="点击更换"  src="<?php echo U('login/verify',array());?>" class="m"> 
                    </div>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#">返回首页</a> &copy; 2014 Powered by <a href="http://jscss.me" target="_blank">有主机上线</a></p>
</div>
</body>
</html>
<script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script>
$("#verify_img").click(function() {

   var verifyURL = "<?php echo U('login/verify');?>";
   //利用JS获取当前时间戳加入到URL之后即可。
   var time = new Date().getTime();
   $("#verify_img").attr({
      "src" : verifyURL + "?" + time
   });
});
//键盘抬起事件
$("#j_verify").keyup(function() {
    $.post("<?php echo U('login/check_verify');?>", {
        code : $("#j_verify").val()
        }, function(data) {

        if (data == true) {
            //验证码输入正确
            alert("验证码输入正确");
        } else {
            //验证码输入错误
            alert("验证码输入错误");
        }
    });
});
</script>