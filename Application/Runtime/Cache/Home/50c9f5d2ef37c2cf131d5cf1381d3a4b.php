<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="/Public/Home/js/jquery-1.7.2.min.js"></script>
<style type="text/css">
#sx{ color:#33F; text-decoration:underline; cursor:pointer;}
</style>
</head>

<body>
<h1>登录页面</h1>
<form action="/index.php/Home/Login/login" method="post">
<div>用户名：<input type="text" name="uid" /></div><br />
<div>密码：&nbsp;<input type="password" name="password" /></div><br />
<div>验证码：<input type="text" name="yzm" /></div><br />
<!--src指向方法 -->
<div><img src="/index.php/Home/Login/yzm" id="yzm" alt="验证码" /><span id="sx">看不清楚，换一张</span></div> 
<input type="submit" value="登录" /> 
</form>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(e) {    
    　　$("#sx").click(function(){        
        $("#yzm").attr("src","/index.php/Home/Login/yzm");//更新src属性        
        })   
});

</script>